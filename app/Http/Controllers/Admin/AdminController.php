<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use Session;
use Alert;

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
            'alamat' => 'Cibiru, Bandung',
            'no_tlp' => $req->input('no_tlp'),
            'instansi' => 'UIN Sunan Gunung Djati',
            'jabatan' => 'admin',
            'password' => bcrypt($req->input('password'))
        ]);
        $admin->attachRole(2);
            Alert::success('Register Success!', 'Berhasil tambah admin');
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
        Alert::success('Sukses!', 'Berhasil suspend akun');
        return redirect()->route('admin/show');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->detachRoles($user->roles);
        $user->attachRole(2);
        Alert::success('Activation Success!', 'Berhasil aktifkan akun');
        return redirect()->route('admin/show');
    }
}