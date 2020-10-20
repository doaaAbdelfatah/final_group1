<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandControler extends Controller
{

    function index(){
        $brands =Brand::all();
         return view("brands.index")->with(compact("brands"));
        // return view("brands.index")->with("brands" ,$brands);
    }
    function store(Request $request){
        
        // validate
        $request->validate([
            "name" => "required|max:100",
            "comments" => "nullable|min:3|max:1000",
        ]);

        $b = new Brand();
        $b->name =$request->name;
        $b->comments =$request->comments;
        $b->save();
      
        return redirect()->back();
        // return redirect("/brand");
        // return redirect()->route("brand"); 
        // return redirect()->action([BrandControler::class ,"index"]);

    }
    function delete($id){
        $b =Brand::find($id);
        if ($b->products->count()==0){
            $b->delete();
        }else{
            session()->put("error" ,"Can't Delete ".$b->name. " Brand it has related record");
        }
        // $b =Brand::find($id);
        // $b->delete();
        // Brand::destroy($id);
        return redirect("/brand");
    }

    function edit($id){
        $b =Brand::find($id);
        return view("brands.edit")->with("brand" ,$b);
    }
    function update(Request $request , $id){
         
        // validate
        $request->validate([
            "name" => "required|max:100",
            "comments" => "nullable|min:3|max:1000",
        ]);
        
        $b =Brand::find($id);
        $b->name =$request->name;
        $b->comments =$request->comments;
        $b->save();
        return redirect("/brand");
    }
}
