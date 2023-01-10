<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    use HasFactory;
    
     protected $guarded = [];

      public function Cart(){
        return $this->hasMany('App\Models\Cart');
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
