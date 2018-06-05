<?php

use App\Barang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', function(){
    $data = Barang::all();
    return view('welcome')
    ->with('val', $data);
});

Auth::routes();

Route::group(['middleware' => ['auth', 'role:superadmin' && 'role:admin']], function () {
    //Home Controller
    Route::get('/admina', 'Admin\AdminController@index')->name('admin');
    Route::get('/admina/newadmin', 'Admin\AdminController@new')->name('admin/new');
    Route::post('/admina/addadmin', 'Admin\AdminController@create')->name('admin/create');
    Route::get('/admina/showadmin', 'Admin\AdminController@show')->name('admin/show');
    Route::post('/admina/adminsus/{id}', 'Admin\AdminController@suspend')->name('admin/suspend');
    Route::post('/admina/adminact/{id}', 'Admin\AdminController@activate')->name('admin/activate');
    //Barang Controller
    Route::get('/admina/showbarang', 'Admin\BarangController@show')->name('admin/showbarang');
    Route::get('/admina/showruangan', 'Admin\BarangController@show')->name('admin/showruangan');
    Route::get('/admina/newbarang', 'Admin\BarangController@new')->name('admin/newbarang');
    Route::post('/admina/addbarang', 'Admin\BarangController@create')->name('barang/create');
    Route::post('/admina/updatebarang/{id}', 'Admin\BarangController@update')->name('barang/update');
    Route::delete('/admina/deletebarang/{id}', 'Admin\BarangController@delete')->name('barang/delete');
    Route::get('/admina/newruangan', 'Admin\BarangController@new')->name('admin/newruangan');
    //Peminjaman Controller
    Route::get('/admina/peminjaman', 'Admin\PeminjamanController@show')->name('admin/showpeminjaman');
    Route::get('/admina/verifikasipeminjaman', 'Admin\PeminjamanController@show')->name('admin/verifpeminjaman');
    Route::post('/admina/acc/{id}', 'Admin\PeminjamanController@acc');
    Route::post('/admina/block/{id}', 'Admin\PeminjamanController@block');
    Route::get('/admina/pengembalian', 'Admin\PengembalianController@show')->name('admin/pengembalian');
    Route::post('/admina/kembali/{id}', 'Admin\PengembalianController@kembali');
    //email
    Route::get('/mail', 'MailController@send');
});

Route::group(['middleware' => ['auth', 'role:suspend']], function () {
    //Home Controller
    Route::get('/suspended', 'SuspendController@index')->name('index/suspend');
});

//This is Routing For Role User
Route::group(['middleware' => ['auth', 'role:user']], function () {
    //Home Controller
    Route::get('/home', 'HomeController@index')->name('home');
    //Peminjaman
    Route::get('/daftarpeminjaman', 'HomeController@show');
    Route::post('/pinjam', 'User\PeminjamanController@pinjam')->name('pinjam');
    Route::post('/verifikasi', 'User\PeminjamanController@verifikasi')->name('verifikasi');
    Route::post('/pdf/{id}', 'User\PdfController@print');
});
