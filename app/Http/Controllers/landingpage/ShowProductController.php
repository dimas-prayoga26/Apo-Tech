<?php

namespace App\Http\Controllers\landingpage;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShowProductController extends Controller
{
    public function index($name, $id)
    {
        $product = Product::where('name', $name)->first();
        $nameToko = Product::with('user')->get();
        $products = Product::where('name', $name)->with('images')->take(4)->get();

        $product = Product::where('name', $name)->first();

            if ($product) {
                $imagePaths = $product->images->pluck('image');

                // dd($imagePaths);
            }

        foreach ($nameToko as $namaToko) {
            $username = $product->user->username;
            // Lakukan sesuatu dengan username...
        }
        return view('landing-page.show-product.index', compact('product', 'products', 'username', 'imagePaths'));
    }

    public function storeOrder(Request $request)
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        try {

            DB::beginTransaction(); 

            
                $user = User::with(['user_detail', 'user_detail.address'])->where('id', $request->user_id)->first();

                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'courier_id' => '54269423-9ed6-4a4c-b9ba-d4f0370f8314',
                    'total_price' => $request->total_price,
                    'shipping_cost' => $request->shipping_cost,
                    'status' => 'unpaid',
                    'note' => $request->note,
                    'is_from_cart' => 0,
                ]);

                    OrderDetail::create([
                        'product_id' => $request->product_id,
                        'order_id' => $order->id,
                        'qty' => $request->qty,
                    ]);


            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ),
                'customer_details' =>  array(
                    'first_name'       => Auth::user()->user_detail->first_name,
                    'last_name'        => Auth::user()->user_detail->last_name,
                    'email'            => Auth::user()->email,
                    'phone'            => Auth::user()->user_detail->phone_number,
                ),
                'shipping_address' => array(
                    'first_name'   => Auth::user()->user_detail->first_name,
                    'last_name'    => Auth::user()->user_detail->last_name,
                    'address'      => Auth::user()->user_detail->address->full_address,
                    'city'         => "Indramayu",
                    'phone'        => Auth::user()->user_detail->phone_number,
                    'country_code' => 'IDN'
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            Order::find($order->id)->update(['snap_token' => $snapToken]);
            DB::commit();
            return $this->okResponse('success', ['snap_token' => $snapToken, 'order_id' => $order->id]);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->serverErrorResponse($th);
        }
    }
}
