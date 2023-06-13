<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->take(4)->get();
        // dd($products);
        return view('landing-page.home', compact('products'));
    }
}
