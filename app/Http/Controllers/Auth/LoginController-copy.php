<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/products/home';
    // public function redirectTo() {
    //     $role = Auth::user()->role->name == 'admin'; 
    //     switch ($role) {
    //       case 'admin':
    //         return '/dashboard';
    //         break;
    //       default:
    //         return '/products/home'; 
    //       break;
    //     }
    //   }
    public function redirectTo()

{ 

if(Auth::user()->role =='admin'){

  return '/dashboard';

}

if (Auth::user()->role == 'customer'){

  return '/products/home'; 

}
else {

   return '/';

}

}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function authenticated(Request $request , $user)
    // {
    //     if($user->role->name == 'admin')
    //         $this->redirectTo = '/dashboard';
    // }
}
