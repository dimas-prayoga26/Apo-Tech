<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contents.category.product-category');
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Category::create([
            'name'          => $request->name,
            // 'is_approved'   => getRoleName() == 'admin' ? true : false,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Add Product Category!',
        ]);
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
        return response()->json([
            'data'  => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::find($id)->update([
            'name'          => $request->name,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update Product Category!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success Delete Product Category!',
        ]);
    }

    public function datatable(Request $request){
        $data = Category::get();
        
        return DataTables::of($data)->make();
    }
}
