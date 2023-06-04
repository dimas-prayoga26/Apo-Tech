<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use Illuminate\Http\Request;
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

            // for($i = 0; $i < sizeof($request->user_id); $i++) {
            //     $order = Order::create([
            //         'user_id' => $request->user_id[$i],
            //         'product_id' => $request->product_id[$i],
            //         'total_price' => $request->total_price[$i],
            //     ]);
            // }   
            
                $order = Order::create([
                    'user_id' => $request->user_id,
                    'product_id' => $request->product_id,
                    'total_price' => $request->total_price,
                ]);

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                )
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
    
            return $this->okResponse('success', $snapToken);
        } catch (\Throwable $th) {
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
