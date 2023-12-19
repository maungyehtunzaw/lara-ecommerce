<?php

namespace App\Repositories\Front;

use App\Interfaces\Front\CartInterface;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartRepository implements CartInterface
{
    public function storeCheckOut($req)
    {
        DB::beginTransaction();
        try {
            if (auth()->guard('cus')->check()) {
                $customers_id = auth()->guard('cus')->user()->id;
                $customer = Customer::find($customers_id);
                $orderItems = OrderItem::where(['customers_id' => $customers_id, 'status' => 0])->whereNull('orders_id')->get()->toArray();
                $dbType = 'database';

                if (!$req->has('deli_id')) {
                    $address =  new Address;
                    $address->customers_id = $customers_id;
                    $address->countries_id = $req->countries_id;
                    $address->city = $req->city;
                    $address->address = $req->address;
                    $address->save();
                    $address_id = $address->id;
                } else {
                    $address_id = $req->deli_id;
                }
            } else {
                //if customer is guest, save customer info
                $customer = new Customer;
                $customer->name = $req->name;
                $customer->email = $req->email;
                $customer->phone = $req->phone;
                $customer->address = $req->address;
                $customer->save();
                $customers_id = $customer->id;
                $orderItems = Session::get('cart');
                $dbType = 'session';

                $address =  new Address;
                $address->customers_id = $customers_id;
                $address->countries_id = $req->countries_id;
                $address->city = $req->city;
                $address->address = $req->address;
                $address->save();
                $address_id = $address->id;
            }

            $order = new Order;
            $order->saleno = 'OD-' . time() . ' '; // genreate order id
            $order->customers_id = $customer->id;
            $order->total_qty = array_sum(array_column($orderItems, 'qty'));
            $order->deliveries_id = $address_id;
            // $order->total_amount =array_sum(array_column($orderItems,'total_amount'));
            $order->payments_id     = $req->payments_id;
            $order->delivery_status = 1; //pending
            $order->paid_status = 2; //pending
            $order->save();
            //save order item
            $totalAmount = 0;
            foreach ($orderItems as $item) {
                $product = Product::find($item['id']);
                if ($dbType == 'database') {
                    $orderItem = OrderItem::find($item['id']);
                }
                if ($dbType == 'session') {
                    $orderItem = new OrderItem;
                }
                $orderItem->orders_id = $order->id;
                $orderItem->customers_id = $customer->id;
                $orderItem->products_id = $item['id'];
                $orderItem->qty = $item['qty'];
                $orderItem->unit_rate = $product->unit_rate; // get rate from database
                $orderItem->total_amount = $item['qty'] * $product->unit_rate;
                $orderItem->status = 0; // in the cart;
                $orderItem->save();
                $totalAmount += $orderItem->total_amount;
            }
            if (Session::has('cart')) {
                Session::forget('cart');
            }

            $order->update(['total_amount' => $totalAmount]);
            DB::commit();
            return [
                'success' => true,
                'message' => "Order placed successfully",

            ];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function addToCart($req)
    {
        $productId = $req->input('product_id');
        $qty = $req->input('qty', 1);
        $overWrite = $req->input('override', false);

        DB::beginTransaction();
        $product = Product::find($productId);
        try {
            if (auth()->guard('cus')->check()) { //save to database if session
                $customerId = auth()->guard('cus')->user()->id;
                $alreadyExist = OrderItem::where(['customers_id' => $customerId, 'products_id' => $productId])->exists();
                if (!$alreadyExist) {
                    $orderItem = new OrderItem;
                    $orderItem->customers_id = $customerId;
                    $orderItem->products_id = $productId;
                    $orderItem->qty = $qty;
                    $orderItem->unit_rate = $product->unit_rate;
                    $orderItem->total_amount = $qty * $product->unit_rate;
                    $orderItem->status = 0; // in the cart;
                    $orderItem->save();
                } else {
                    //update qty
                    $orderItem = OrderItem::where(['customers_id' => $customerId, 'products_id' => $productId])->first();
                    if ($overWrite) {
                        $orderItem->update(['qty' => $qty, 'total_amount' => $qty * $product->unit_rate, 'unit_rate' => $product->unit_rate]);
                    } else
                       {
                    $orderItem->update(['qty' => $qty + $orderItem->qty, 'total_amount' => ($qty + $orderItem->qty) * $product->unit_rate, 'unit_rate' => $product->unit_rate]);
                       }
                }
            } else {
                //for guest user, save to session
                $cart = Session::get('cart');

                if (isset($cart[$productId])) { //existing item
                    if ($overWrite) {
                        $cart[$productId]['qty'] = $qty;
                        $cart[$productId]['product']['unit_rate'] = $product->unit_rate;
                    } else {
                        $cart[$productId]['qty'] += $qty;
                        $cart[$productId]['product']['unit_rate'] = $product->unit_rate; // on change price during session
                    }

                } else {
                    $cart[$productId] = [
                        "id" => $product->id,
                        "qty" => $qty,
                        "product" => [
                            "id" => $product->id,
                            "name" => $product->name,
                            "unit_rate" => $product->unit_rate,
                            "total_amount"=>$product->unit_rate*$qty,
                        ]
                    ];
                }
                Session::put('cart', $cart);
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Added the ' . $product->name . ' to the cart',
                'data' => '',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Internal Sever error, Try again later',
                'data' => $e->getMessage(),
            ]);
        }
    }
    public function removeFromCart(Request $req)
    {

        $productId = $req->input('product_id');
        DB::beginTransaction();
        $qty = 0;
        try {
            if (auth()->guard('cus')->check()) { //save to database if session
                $customerId = auth()->guard('cus')->user()->id;
                $orderItem = OrderItem::where(['customers_id' => $customerId, 'products_id' => $productId, 'status' => 0])->whereNull('orders_id')->first();
                $qty = $orderItem->qty;
                $orderItem->delete();
            } else {
                $cart = Session::get('cart');
                $qty = $cart[$productId]['qty'];
                if (isset($cart[$productId])) {
                    unset($cart[$productId]);
                    session()->put('cart', $cart);
                }
            }
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Remove Item Success # ' . $productId,
                'product_id' => $productId,
                'qty' => $qty,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Internal Sever error, Try again later',
                'data' => $e->getMessage(),
            ]);
        }
    }
    public function getCartItem()
    {
        if (auth()->guard('cus')->check()) {
            $customerId = auth()->guard('cus')->user()->id;
            $customer = Customer::with('addresses')->find($customerId);
            $orderItems = OrderItem::with('product:id,name,unit_rate')->where(['customers_id' => $customerId, 'status' => 0])->whereNull('orders_id')->get()->toArray();
        } else {
            //get order item from session
            $orderItems = Session::get('cart');
            $customer = [];
            // dd("here?");
        }
        return $orderItems;
    }
}
