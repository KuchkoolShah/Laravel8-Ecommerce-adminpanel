<?php

namespace Database\Factories;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
           return [
            'name' => 'admin',
          'description'=>$this->faker->text(100),
      
        ];
    }
}
