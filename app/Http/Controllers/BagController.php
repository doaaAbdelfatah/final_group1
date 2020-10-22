<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BagController extends Controller
{
    function add(Product $product){
        if (session()->has("bag"))
        {
            $bag =  session()->get("bag");
            $bag[$product->id] = $product;
            session()->put("bag" ,$bag );
        
        }else{
            $bag[$product->id] =$product;
            session()->put("bag" ,$bag );
        }
       return redirect()->back();
    }  
    
    function remove(Product $product){
        if (session()->has("bag"))
        {
            $bag =  session()->get("bag");  
            unset($bag[$product->id]); 
            session()->put("bag" ,$bag );  
        }
       return redirect()->back();
    }
}
