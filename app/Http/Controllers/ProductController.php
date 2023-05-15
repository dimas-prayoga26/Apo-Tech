<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
        return view('contents.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'description'      => 'required',
            'image'            => 'image|mimes:jpeg,jpg,png,webp,svg,PNG,JPG,JPEG',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $path = 'files/product/image/';
            
    
            if($request->file('image')){
                $file = $request->file('image');
                $productImageFileName = md5($file->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $file->getClientOriginalExtension();
                $image = ['image'=> $path.$productImageFileName];
            }else{
                $image = [];
            }

            $user_id = Auth::user()->id;
            $categoryIds = implode(',', $request->category_id ?? []);

            $product = Product::updateOrCreate(
                [ 'id' => $request->id ],
                [
                    'user_id'               => $user_id,
                    'category_id'           => $categoryIds,
                    'name'                  => $request->name,
                    'description'           => $request->description,
                    'price'                 => $request->price,
                    'stock'                 => $request->stock,
                    'is_need_prescription'  => $request->is_need_prescription ? true : false,
                ]+$image
            );
            
            // foreach(($request->category_id ?? []) as $item){
            //     Category::create([
            //         'product_id'               => $product->id,
            //         'category_id'              => $item
            //     ]);

            // }
            // dd($request);
            
            foreach($request->file('product_image') ?? [] as $key => $item){
                $fileName[$key] = md5($item->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $item->getClientOriginalExtension();
                ProductImage::create([
                    'product_id'      => $product->id,
                    'image'         => $path.$fileName[$key]
                ]);
            }
            
            if(count($request->allFiles()) > 0){
                if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);
                foreach($request->file('product_image') as $key => $file){
                    $file->move($path, $fileName[$key]);
                }
                if($request->file('image')) $request->file('image')->move($path, $productImageFileName);
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('product.index')->with('success', 'Success Create Product!');
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
