<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new Brand();
        $b->name ="Zara";
        $b->save();
        $b = new Brand();
        $b->name ="LG";
        $b->save();
        $b = new Brand();
        $b->name ="Saumsung";
        $b->save();
    }
}
