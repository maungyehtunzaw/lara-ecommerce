<?php
namespace App\Repositories\Api;

use App\Interfaces\Api\CustomerAuthInterface;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerAuthRepository implements CustomerAuthInterface
{
    public function register($req): array
    {
        DB::beginTransaction();
        try{
            $customer = new Customer();
            $customer->phone = $req->phone;
            $customer->first_name = $req->first_name;
            $customer->last_name = $req->last_name;
            // $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->password = Hash::make($req->password);
            $customer->save();
            DB::commit();
            return [
                'success' => true,
                'status' => 200,
                'message' => 'your account register successfully',
                'customer' => $customer
            ];

        }catch(\Exception $e){
            DB::rollBack();
            return [
                'success' => false,
                'status' => 500,
                'message' => 'your account register failed',
                'error' => $e->getMessage()
            ];
        }
        return [];
    }
    public function login(array $credentials)
    {
        //  return $credentials['email'];
        $customer = Customer::where('email', $credentials['email'])->first();
        if ($customer) {
            if (Hash::check($credentials['password'], $customer->password)) {
                $tokenObj = $customer->createToken('e-commerce-customer');
                $response['accessToken'] = $tokenObj->accessToken;
                $response['expired_in'] = $tokenObj->token->expires_at->diffInSeconds(Carbon::now());
                $response['expired_at']=$tokenObj->token->expires_at;
                $response['success'] = true;
                $response['status'] = 200;
                $response['message'] = 'Login Success';
                $response['customer'] = $customer;

            } else {
                $response['success'] = false;
                $response['status'] = 422;
                $response['messge'] = 'Worng Password';

            }
        } else {
            $response['status'] = 404;
            $response['success'] = false;
            $response['message'] = 'Customer does not exist';

        }
        return $response;
    }
    public function logout(): void
    {

    }
    public function resetPassword(array $data): void
    {

    }

}
