<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create(["name"=>"Electronics"]);
       Category::create(["name"=>"Mobile" ,"category_id" =>1]);
       Category::create(["name"=>"Tablets" ,"category_id" =>1]);
    }
}
