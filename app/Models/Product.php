<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =["name" ,"price" ,"qty" ,"brand_id" ,"user_id" ,"category_id"];
    
    function brand(){
        // return $this->belongsTo(Brand::class ,"brand_id" ,"id");
        return $this->belongsTo(Brand::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function images(){
        return $this->hasMany(ProductImage::class ,"product_id" ,"id");
    }
}
