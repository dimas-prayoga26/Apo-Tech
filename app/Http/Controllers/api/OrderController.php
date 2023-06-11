<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            $orders = Order::where('user_id', $id)->with(['order_details', 'order_details.product', 'order_details.product.images' ,'order_details.product.user'])->get();
            return $this->okResponse('success',$orders);
        } catch (\Throwable $th) {
            return $this->serverErrorResponse($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        try {

            DB::beginTransaction(); 

                $user = User::with('user_detail')->where('id', $request->user_id)->first();

                $order = Order::create([
                    'user_id' => $request->user_id,
                    'courier_id' => $request->courier_id,
                    'total_price' => $request->total_price,
                    'shipping_cost' => $request->shipping_cost,
                    'status' => 'unpaid',
                    'note' => $request->note,
                ]);

                foreach($request->list_product as $item){
                    OrderDetail::create([
                        'product_id' => $item['product_id'],
                        'order_id' => $order->id,
                        'qty' => $item['qty'],
                    ]);
                }


            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' =>  array(
                    'first_name'       => $user->user_detail->first_name,
                    'last_name'        => $user->user_detail->last_name,
                    'email'            => $user->email,
                    'phone'            => $user->user_detail->phone_number,
                )
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            DB::commit();
            return $this->okResponse('success', ['snap_token' => $snapToken, 'order_id' => $order->id]);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->serverErrorResponse($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $response = HTTP::withHeaders();
            DB::beginTransaction();
            Order::find($id)->update([
                'status' => $request->status,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->serverErrorResponse($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
