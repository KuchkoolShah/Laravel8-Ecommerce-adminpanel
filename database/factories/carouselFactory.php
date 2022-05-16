<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\carousel;
use Illuminate\Support\Str;
class carouselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            
             'name'=> $this->faker->text(40),
             
             'description'=>$this->faker->text(100),
             'price' => $this->faker->numberBetween(200, 500),
             
             'image' => 'digital_'.$this->faker->numberBetween(1,3).'.jpg',
             
        ];
    }
}
