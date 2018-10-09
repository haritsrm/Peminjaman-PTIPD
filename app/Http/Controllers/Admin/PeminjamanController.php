<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Acc;
use App\History;
use App\Barang;
use App\Peminjaman;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;

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
            'by' => Auth::user()->name,
        ]);
        History::create([
            'kode' => Acc::find($id)->kode,
            'activate' => 1,
            'by' => Auth::user()->name,
        ]);
        Session::flash('message', 'Acc data berhasil!');
        return redirect()->route('admin/verifpeminjaman');
    }

    public function block($id)
    {
        $x = Acc::find($id);
        $x->update([
            'activate' => 5,
            'by' => Auth::user()->name,
        ]);
        History::create([
            'kode' => Acc::find($id)->kode,
            'activate' => 5,
            'by' => Auth::user()->name,
        ]);
        $c = Peminjaman::all()->where('kode', $x->kode);
        foreach ($c as $d){
            $stok = Barang::find($d->barang_id)->stock;
            $newstok = $stok + $d->jumlah;
            Barang::find($d->barang_id)->update([
                'stock' => $newstok
            ]);
        }
        Session::flash('message', 'Block data berhasil!');
        return redirect()->route('admin/verifpeminjaman');
    }
}