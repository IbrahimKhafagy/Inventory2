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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        // Hint: Auth::user() is the currently signed in user object.
        /*$first_time_login = false;
            if (Auth::user()->first_time_login) {
                                           $first_time_login = true;
                                     Auth::user()->first_time_login = 1; // Flip the flag to true
                                      Auth::user()->save(); // By that you tell it to save the new flag value into the users table
                                                   }
                                                   return('your view', ['login'=>first_time _login]);
                                                   */

        return ['email' => $request->email, 'password' => $request->password, 'Status' => 'Active'];
    }
}
