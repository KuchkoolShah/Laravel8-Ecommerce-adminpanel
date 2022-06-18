<?php

namespace Database\Factories;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class RoleFactory extends Factory
{


    protected $model =Role::class;
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
