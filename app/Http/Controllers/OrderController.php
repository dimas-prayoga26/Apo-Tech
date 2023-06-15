<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\UserApotech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($name, $id)
    {
    // dd($id);
    $user = Auth::user();
    $userApotechesPenjual = Product::with('user')->where('id', $id)->get();
    $product = Product::with('images')->find($id);
    // $productImages = $product->images;

    $userApoteches = UserApotech::with('user')->where('user_id', $user->id)->get();
    $userAddress = Address::with('userApotech')->where('user_apotech_id', $userApoteches->first()->id)->get();
    
    // Mengambil data produk berdasarkan nama
    $product = Product::where('name', $name)->first();

    // Mengambil harga produk
    $price = $product->price;

    // Menampilkan halaman checkout dengan data pesanan
    return view('landing-page.checkout.index', compact('user', 'product', 'price', 'userApoteches' , 'userAddress', 'userApotechesPenjual'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
