<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];

     protected $dates = ['deleted_at'];
    
    use HasFactory;
    public function user() {
		return $this->belongsTo('App\Models\User');
	}
}
