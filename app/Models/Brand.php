<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable =["name" ,"comments"];
//    protected $hidden =["comments"];
   
    function products(){
        // return $this->hasMany(Product::class);
        return $this->hasMany(Product::class ,"brand_id" ,"id");
    }

    function categories(){
        return $this->belongsToMany(Category::class, Product::class);
    }
}
