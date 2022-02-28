<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin\Category;
use Illuminate\Support\Str;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
  
            $category_name = $this->faker->unique()->words($nb=2, $asText=true);
            $slug = Str::slug($category_name);
            
            return [
               'name'=>$category_name ,
                 'slug'=>$slug,
                 'description'=>$this->faker->text(100),
                 'image' => 'digital_'.$this->faker->numberBetween(1, 20).'.jpg'
                ];
        
    }
}
