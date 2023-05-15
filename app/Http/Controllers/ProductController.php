<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contents.product.index');
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
    public function destroy($id)
        {   
            Product::find($id)->delete();
            return response()->json([
                'status'    => true,
                'message'   => 'Success Delete Category and its Products!',
            ]);
        }



    public function datatable(Request $request){
        $data = Product::with('category')->get();


        // $data = $data->get();
        
        return DataTables::of($data)->make();
    }

    public function prescription(Request $request)
    {

        // dd($request);
        Product::find($request->id)->update([
            'is_need_prescription'   => $request->state,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Success Update prescription!',
        ]);
    }
}
