<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['images', 'user.user_detail', 'category', 'user.user_detail.address']);
        if(request('search')){
            $data = Product::with(['images', 'user.user_detail', 'category', 'user.user_detail.address'])->where('name', 'like', '%'.request('search').'%')->orWhere('description', 'like', '%'.request('search').'%');
        }
        return $this->okResponse('Success',$data->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function search(Request $request)
    {
        $data = null;
        if ($request->search != null || $request->search != '') {
            $data = Product::with(['images', 'user.user_detail', 'user.user_detail.address', 'category'])->where('name', 'like', '%'.$request->search.'%')->orWhere('description', 'like', '%'.$request->search.'%')->get();
        }
        return $this->okResponse('Success',$data);
    }
}
