<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Barang;
use Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BarangController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.newbarang');
    }

    public function show()
    {
        $data = Barang::all();
        return view('admin.showbarang')->with('val', $data);
    }

    public function create(Request $req)
    {
        $file = $req->file('pict');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(10000,1001238912).".".$ext;
        $file->move('uploads/', $newName);
        $barang = Barang::create([
            'name' => $req->input('name'),
            'type' => $req->input('type'),
            'pict' => $newName,
            'description' => $req->input('description'),
            'stock' => $req->input('stock'),
            'status' => $req->input('status'),
        ]);
        Session::flash('message', 'Success tambah '. $req->input('type') .'!');
        if ($req->input('type') == 'barang'){
            return redirect()->route('admin/newbarang');
        }else{
            return redirect()->route('admin/newruangan');
        }
        
    }

    public function update(Request $req, $id)
    {
        $file = $req->file('pict');
        if($file){
            $ext = $file->getClientOriginalExtension();
            $newName = rand(10000,1001238912).".".$ext;
            $file->move('uploads/', $newName);
            $barang = Barang::find($id)->update([
                'name' => $req->input('name'),
                'type' => $req->input('type'),
                'pict' => $newName,
                'description' => $req->input('description'),
                'stock' => $req->input('stock'),
                'status' => $req->input('status'),
            ]);
        }else{
            $barang = Barang::find($id)->update([
                'name' => $req->input('name'),
                'type' => $req->input('type'),
                'pict' => Barang::find($id)->pict,
                'description' => $req->input('description'),
                'stock' => $req->input('stock'),
                'status' => $req->input('status'),
            ]);
        }
        Session::flash('message', 'Success update barang!');
        return redirect()->route('admin/showbarang');
    }

    public function delete($id)
    {
        Barang::destroy($id);
        Session::flash('message', 'Berhasil Hapus Barang!');
        return redirect()->route('admin/showbarang');
    }
}