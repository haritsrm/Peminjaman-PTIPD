<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Acc;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $x = User::all();
        return view('dashboard')
        ->with('data', $x);
    }

    public function pinjambarang()
    {
        $data = Barang::all();
        return view('home')->with('val',$data);
    }

    public function show(){
        $data = Acc::orderBy('created_at', 'desc')->get();
        return view('daftarpeminjaman')->with('val', $data);
    }
}
