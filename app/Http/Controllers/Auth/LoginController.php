<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Alert;

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
            Alert::success("Here your dashboard", "Welcome back ".Auth::user()->name);
            return redirect()->route('admin');
        }
        else if (Auth::user()->hasRole('admin'))
        {
            Alert::success("Here your dashboard", "Welcome back ".Auth::user()->name);
            return redirect()->route('admin');
        }
        else if (Auth::user()->hasRole('suspend'))
        {
            Alert::success("Here your dashboard", "Welcome back ".Auth::user()->name);
            return redirect()->route('index/suspend');
        }
        else
        {
            Alert::success("Here your dashboard", "Welcome back ".Auth::user()->name);
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
