<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\User;
class Role extends Model
{
    use HasFactory;
    //protected $guarded = [];
    protected $fillable = [
        'name','description',
    ];

     protected $dates = ['deleted_at'];
    
    public function users(){
    	return $this->hasMany('App\Models\User');
    }

}
