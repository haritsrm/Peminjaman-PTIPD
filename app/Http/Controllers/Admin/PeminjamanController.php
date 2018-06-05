<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Acc;
use App\Peminjaman;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PeminjamanController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Acc::all();
        return view('admin.showpeminjaman')->with('val', $data);
    }

    public function acc($id)
    {
        Acc::find($id)->update([
            'activate' => 1,
        ]);
        Session::flash('message', 'Acc data berhasil!');
        return redirect()->route('admin/verifpeminjaman');
    }

    public function block($id)
    {
        Acc::find($id)->update([
            'activate' => 5,
        ]);
        Session::flash('message', 'Block data berhasil!');
        return redirect()->route('admin/verifpeminjaman');
    }
}