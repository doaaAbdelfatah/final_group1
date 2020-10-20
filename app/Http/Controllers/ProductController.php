<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view("products.index")->with("products" , Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" =>"required",
            "price" =>"required",
            "qty" =>"required",
            "category_id" =>"required",
        ]);

        $product = new Product();
        $product->name =$request->name;
        $product->price =$request->price;
        $product->qty =$request->qty;
        $product->category_id =$request->category_id;
        $product->brand_id =$request->brand_id;
        $product->save();

        $files = $request->file("imgs");
        foreach($files as $file){
          $img_name = Storage::disk("public")->put("product_images" ,$file); 
          $pi = new ProductImage();
          $pi->img = $img_name;         
          $pi->product_id =  $product->id;
          $pi->save();
        }
      
        
        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.edit")->with(compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" =>"required",
            "price" =>"required",
            "qty" =>"required",
            "category_id" =>"required",
        ]);
        
        $product->name =$request->name;
        $product->price =$request->price;
        $product->qty =$request->qty;
        $product->category_id =$request->category_id;
        $product->brand_id =$request->brand_id;
        $product->save();
        
        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("product.index");
    }
}
