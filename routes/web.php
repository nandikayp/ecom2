<?php

use App\Http\Controllers\UserCon;
use App\Http\Controllers\LoginCon;
use App\Http\Controllers\ProdukCon;
use App\Http\Controllers\RegisterCon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\PembelianCon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('components.home');
})->name('home');


Route::get('/barang', function () {
    return view('components.barang',[
        'produk'=> DB::table('produk')->get()
    ]);
});


//Login
Route::post('actionlogin', [LoginCon::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [DashboardCon::class, 'index'])->name('dashboard')->
middleware('auth');
Route::get('actionlogout', [LoginCon::class, 'actionlogout'])->name('actionlogout')->
middleware('auth');


//Register
Route::get('register', [RegisterCon::class, 'register'])->name('register');
Route::post('register/action', [RegisterCon::class, 'actionregister'])-> name('actionregister');


//Produk
Route::get('/produk', [ProdukCon::class, 'index'])->name('indexproduk')->middleware('auth');
Route::get('/produk/input', [ProdukCon::class, 'input'])->name('inputproduk')->middleware('auth');
Route::post('/produk/storeinput', [ProdukCon::class, 'storeinput'])->name('storeInputproduk')->middleware('auth');
Route::get('/produk/update/{id}', [ProdukCon::class, 'update'])->name('updateproduk')->middleware('auth');
Route::post('/produk/storeupdate', [ProdukCon::class, 'storeupdate'])->name('storeUpdateproduk')->middleware('auth');
Route::get('/produk/delete/{id}', [ProdukCon::class, 'delete'])->name('deleteproduk')->middleware('auth');
Route::get('/produk/upload', [ProdukCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/produk/uploadproses', [ProdukCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');
Route::Get('/produk/search', [ProdukCon::class, 'search'])->name('search')->middleware('auth');

//Pembelian
Route::get('/pembelian', [PembelianCon::class, 'index'])->name('indexpembelian')->middleware('auth');
Route::get('/pembelian/input', [PembelianCon::class, 'input'])->name('inputpembelian')->middleware('auth');
Route::post('/pembelian/storeinput', [PembelianCon::class, 'storeinput'])->name('storeInputpembelian')->middleware('auth');
Route::get('/pembelian/update/{id}', [PembelianCon::class, 'update'])->name('updatepembelian')->middleware('auth');
Route::post('/pembelian/storeupdate/{id}', [PembelianCon::class, 'storeupdate'])->name('storeUpdatepembelian')->middleware('auth');
Route::get('/pembelian/delete/{id}', [PembelianCon::class, 'delete'])->name('deletepembelian')->middleware('auth');
Route::post('/update/pembelian/{id}',[PembelianCon::class,'updatepembelian']);


//User
Route::get('/user/tampil', [UserCon::class, 'index'])->name('indexUser')->middleware('auth');
Route::get('/user/input', [UserCon::class, 'input'])->name('inputUser')->middleware('auth');
Route::post('/user/storeinput', [UserCon::class, 'storeinput'])->name('storeInputUser')->middleware('auth');
Route::get('/user/update/{id}', [UserCon::class, 'update'])->name('updateUser')->middleware('auth');
Route::post('/user/storeupdate', [UserCon::class, 'storeupdate'])->name('storeUpdateUser')->middleware('auth');
Route::get('/user/delete/{id}', [UserCon::class, 'delete'])->name('deleteUser')->middleware('auth');

