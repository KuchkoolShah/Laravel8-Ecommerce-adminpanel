<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Category;
class AdminController extends Controller
{
     public function __construct(){
     
    }
    public function dashboard(){

        
    	return view('admin.home');
    }
}
