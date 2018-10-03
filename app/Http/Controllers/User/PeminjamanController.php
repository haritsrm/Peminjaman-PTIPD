<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Barang;
use App\Acc;
use Session;
use Alert;

class PeminjamanController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pinjam(Request $req)
    {
        return view('verifikasi')->with('req', $req);
    }

    public function verifikasi(Request $req)
    {
        $kode = rand(10000,1001238912);
        $x = $req->barang;
        for ($i = 1; $i <= count($x); $i++){
            $stok = Barang::find($req->barang[$i])->stock;
            $newstok = $stok - $req->jumlah[$i];
            Peminjaman::create([
                'kode' => $kode,
                'user_id' => $req->input('user_id'),
                'tgl_pinjam' => $req->input('tgl_pinjam'),
                'tgl_kembali' => $req->input('tgl_kembali'),
                'barang_id' => $req->barang[$i],
                'jumlah' => $req->jumlah[$i],
            ]);
            Barang::find($req->barang[$i])->update([
                'stock' => $newstok,
            ]);
        }
        Acc::create([
            'kode' => $kode,
            'activate' => 0,
        ]);
        Alert::info('Harap menunggu persetujuan admin','Wait..');
        return redirect('home');
    }
}