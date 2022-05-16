<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
 
 public function loginUser(){
 	return view('customer.login');
 	 }

 	  public function loginRegister(){
 	return view('customer.register');
 	 }
}
