<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id=0;
        if(Category::all()->count()>0){
            $id = Category::all()->random()->id ; 
        }        

        return [
            'name' => $this->faker->company,
            "category_id" => ( $id != 0)? $id : null,
        ];
    }
}
