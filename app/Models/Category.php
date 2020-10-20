<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =["name" ,"category_id"];
    // 1 to many  (hasMany - belongsTo)
    
    function sub_categories(){
        return $this->hasMany(Category::class);
    }

    function main_category(){
        return $this->belongsTo(Category::class ,"category_id" ,"id");
    }

    function products(){        
        return $this->hasMany(Product::class ,"category_id" ,"id");
    }

    function brands(){
        return $this->belongsToMany(Brand::class , Product::class);
    }
}
