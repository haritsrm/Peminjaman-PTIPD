<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function authenticated(){
        if (Auth::user()->hasRole('superadmin'))
        {
            return redirect()->route('admin');
        }
        else if (Auth::user()->hasRole('admin'))
        {
            return redirect()->route('index/admin');
        }
        else if (Auth::user()->hasRole('suspend'))
        {
            return redirect()->route('index/suspend');
        }
        else
        {
            return redirect()->route('home');
        }
    }

    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
