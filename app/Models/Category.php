<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\models\CategoryParent;
use App\models\Category;



class Category extends Model
{
    use HasFactory;
  
    
    protected $guarded = [];

      public function childrens(){
        return $this->belongsToMany(Category::class,'category_parent','parent_id','category_id');
    }
    public function parents(){
        return $this->belongsToMany(Category::class,'category_parent','category_id','parent_id');
    }

         public function products(){
        return $this->belongsToMany('App\Models\Product', 'category_product');
    }
}