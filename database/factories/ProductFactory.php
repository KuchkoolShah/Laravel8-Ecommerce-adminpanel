<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\Product;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $product_name = $this->faker->unique()->words($nb=4 , $asText=true);
        $slug = Str::slug($product_name);
        return [
            
             'name'=> $product_name ,
             'slug'=> $slug , 
             'short_description'=> $this->faker->text(200),
             'description'=>$this->faker->text(200),
             'regular_price' => $this->faker->numberBetween(200, 500),
             'SKU'=>'DIGI'.$this->faker->unique()->numberBetween(200, 500),
             'stock_status'=>'instock',
             'quantity'=>$this->faker->numberBetween(200, 500),
             'image' => 'digital_'.$this->faker->numberBetween(1, 20).'.jpg',
             'category_id'=>$this->faker->numberBetween(1, 5)
        ];
    
    }
}
