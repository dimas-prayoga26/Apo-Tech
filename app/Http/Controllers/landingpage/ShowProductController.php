<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProductController extends Controller
{
    public function index($nama_produk)
    {
        $product = Product::where('name', $nama_produk)->first();
        $nameToko = Product::with('user')->get();
        $products = Product::where('name', $nama_produk)->with('images')->take(4)->get();

        $product = Product::where('name', $nama_produk)->first();

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
}
