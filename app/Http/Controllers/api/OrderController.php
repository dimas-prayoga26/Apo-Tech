<?php

namespace App\Http\Controllers\api;

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
    public function index()
    {
        //
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
            
                $order = Order::create([
                    'user_id' => $request->user_id,
                    'courier_id' => $request->courier_id,
                    'total_price' => $request->total_price,
                    'shipping_cost' => $request->shipping_cost,
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
                )
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            DB::commit();
            return $this->okResponse('success', $snapToken);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
