<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name ,
            "price" =>$this->faker->numberBetween(150,9000),
            "qty" =>$this->faker->numberBetween(1,150),
            "brand_id" => Brand::all()->random()->id,
            "category_id" => Category::all()->random()->id,
            "user_id" => User::where("role" ,"seller")->get()->random()->id,            
        ];
    }
}
