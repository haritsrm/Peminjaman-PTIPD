<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class SettingController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $x = Auth::user();
        return view('layouts.setting')
        ->with('data', $x);
    }

    public function changePassword()
    {
        $current_password = Auth::User()->password;           
        if(\Hash::check($request->input('pass'), $current_password))
        {
            $cp = Auth::user()->password = Hash::make($req->input('newpass'));
            $cp->save();
            Alert::success("Berhasil". "Berhasil merubah password!");
            return redirect()->back();
        }else{
            Alert::error("Oops..". "Password tidak sesuai!");
            return redirect()->back();
        }
    }
}