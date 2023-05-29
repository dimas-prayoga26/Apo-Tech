<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contents.product_category.index');
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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }

        try {
            DB::beginTransaction();

            if($request->hasFile('image')){
                $image = $request->file('image');
                $path = 'files/category/image/';
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();
                $image->move($path, $nameFile);
                $imagePath = $path.$nameFile;
            } else {
                $imagePath = '';
            }

            $categoryProduct = new Category();
            $categoryProduct->name = $request->name;
            $categoryProduct->image = $imagePath;
            $categoryProduct->save();

            DB::commit();

            return response()->json(['status' => true, 'message' => 'Data saved successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error saving data: '.$e->getMessage()]);
        }
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', $validator->errors()->first())
                ->withInput();
        }
    
        try {
            DB::beginTransaction();
    
            $categoryProduct = Category::find($id);
    
            if (!$categoryProduct) {
                return response()->json(['status' => false, 'message' => 'Data not found!']);
            }
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = 'files/category/image/';
                $nameFile = md5($image->getClientOriginalName(). rand(rand(231, 992), 123882)). "." . $image->getClientOriginalExtension();

                $image->move($path, $nameFile);
            } else {
                $imagePath = $categoryProduct->image;
            }
          
            $imagePath = $path.$nameFile;
            if ($categoryProduct->image && file_exists($categoryProduct->image)) {
                unlink($categoryProduct->image);
            }
  
            $categoryProduct->image = $imagePath;
            $categoryProduct->name = $request->name;
            $categoryProduct->save();
    
            DB::commit();


            return response()->json(['status' => true, 'message' => 'Data updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Error updating data: '.$e->getMessage()]);
        }
        
      
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

    public function select2(Request $request){
        $query = $request->term['term'] ?? '';
        $data = Category::where('name', 'LIKE', "%$query%")->get();

        // dd($data);
        return response()->json($data);
    }
}
