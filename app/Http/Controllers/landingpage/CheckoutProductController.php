<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Address;
use App\Models\Product;
use App\Models\UserApotech;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutProductController extends Controller
{
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


}
