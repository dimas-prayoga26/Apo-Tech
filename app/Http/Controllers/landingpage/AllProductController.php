<?php

namespace App\Http\Controllers\landingpage;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllProductController extends Controller
{
    public function index()
    {

        // $products = Product::with('images')->take(20)->get();
        $data = Product::with(['images', 'user.user_detail', 'category']);

            if(request('search')){
                $data = Product::with(['images', 'user.user_detail', 'category'])->where('name', 'like', '%'.request('search').'%')->orWhere('description', 'like', '%'.request('search').'%');
            }
            $data = $data->take(20)->get();

            // dd(request()->all());

        
        return view('landing-page.all-product.index', compact('data'));
    }
}
