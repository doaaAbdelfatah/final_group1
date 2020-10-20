<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("cats.index")->with(compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cats.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["name"=>"required"]);
        $cat = new Category();
        $cat->name = $request->name;
        $cat->category_id = $request->category_id;
        $cat->save();
        return redirect()->route("category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("cats.show")->with("category" ,$category);
        // dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("cats.edit")->with(compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(["name"=>"required"]);
       
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->route("category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->products->count()==0){
            $category->delete();
        }else{
            session()->flash("error" ,"Can't Delete ".$category->name. " Category it has related record");
        }
        
        return redirect()->route("category.index");
    }


    function userCats(Category $category){
        // dd($category);
        return view("site.cat_products")->with(compact("category"));
    }
}
