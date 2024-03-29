<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
  
    
    protected $guarded = [];

   
       public function categories(){
    	return $this->belongsToMany('App\Models\Category','category_product');
    }

      public function getRouteKeyName(){
       return 'slug';
   }
}
