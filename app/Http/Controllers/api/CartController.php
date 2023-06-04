<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            $data = Cart::where('user_id', $id)->get(); 
            return $this->okResponse('success', $data);
        } catch (\Throwable $th) {
            return $this->serverErrorResponse($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'numeric'
        ]);

        try {

            Cart::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'qty' => $request->qty
            ]);

            return $this->okResponse('Berhasil Menambahkan Ke Keranjang');

        } catch (\Throwable $th) {
            return $this->serverErrorResponse($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function inc($id)
    {
        $cart = Cart::find($id);
        try {
            $cart->update([
                'qty' => $cart->qty + 1
            ]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function dec($id)
    {
        $cart = Cart::find($id);
        try {
            $cart->update([
                'qty' => $cart->qty-1
            ]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
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
        try {
            Cart::find($id)->delete();
            return $this->okResponse('Produk berhasil dihapus');
        } catch (\Throwable $th) {
            return $this->serverErrorResponse($th->getMessage());
        }

    }
}
