<?php
use App\Interfaces\Admin\OrderInterface;
use App\Models\Order;

class OrderRepository implements OrderInterface
{
   public function getOrderDetail(Order $order): ?array
   {
       return $order->load('orderDetails')->toArray();
   }
}
