<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\User;
class Profile extends Model
{
	//protected $guarded = [];
  protected $fillable = [
    'name','slug','user_id','phone','address',
];

     protected $dates = ['deleted_at'];
    
    use HasFactory;
    public function user() {
		return $this->belongsTo('App\Models\User');
	}
}
