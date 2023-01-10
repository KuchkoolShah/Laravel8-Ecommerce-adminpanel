<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AdminUser::class);
       \App\Models\User::factory(1)->create();
       \App\Models\Category::factory(16)->create();
        \App\Models\Product::factory(22)->create();
         \App\Models\carousel::factory(3)->create();
      // \App\Models\Role::factory(1)->create();
         
    }
}
