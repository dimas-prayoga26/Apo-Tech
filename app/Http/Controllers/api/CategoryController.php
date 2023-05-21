<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Category::get();
            return $this->okResponse('Success',$data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
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
    public function showProducts($id)
    {
        try {
            $data = Product::where('category_id', $id)->with(['images', 'user.userDetail'])->get();
            return $this->okResponse('Success',$data);
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
        //
    }
}
