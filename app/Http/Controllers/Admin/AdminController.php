<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use Session;

class AdminController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.newadmin');
    }

    public function index()
    {
        $x = User::all();
        return view('admin.admin')
        ->with('data', $x);
    }

    public function create(Request $req)
    {
        $admin = User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'), 
            'alamat' => $req->input('alamat'),
            'no_tlp' => $req->input('no_tlp'),
            'instansi' => $req->input('instansi'),
            'jabatan' => $req->input('jabatan'),
            'password' => bcrypt($req->input('password'))
        ]);
        $admin->attachRole(2);
            Session::flash('message', 'Successfully add admin!');
            return redirect()->route('admin/new');
    }

    public function show()
    {
        $data = User::all();
        return view('admin.showadmin')->with('val', $data);
    }

    public function suspend($id)
    {
        $user = User::find($id);
        $user->detachRoles($user->roles);
        $user->attachRole(4);
        Session::flash('message', 'Successfully suspend account!');
        return redirect()->route('admin/show');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->detachRoles($user->roles);
        $user->attachRole(2);
        Session::flash('message', 'Successfully Activate account!');
        return redirect()->route('admin/show');
    }
}