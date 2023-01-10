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
  

    protected function redirectTo()
      {
        if (Auth::user()->user_type == 'Administrator')
        {
          return 'dashboard ';  // admin dashboard path
        } else {
          return '/products/home';  // member dashboard path
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
    // protected function loggedOut(Request $request)
    // {
    //     return redirect()->route('/products/home');
    // }
    // protected function authenticated(Request $request , $user)
    // {
    //     if($user->role->name == 'admin')
    //         $this->redirectTo = '/dashboard';
    // }
}
