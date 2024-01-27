<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class ProdukCon extends Controller
{
      public function index(Request $request)
    {


        $produk = DB::table('produk')->get();
        return view('produk', ['produk' => $produk]);
    }


    public function input()
    {
        return view('tambahproduk');
    }

    public function storeinput(Request $request)
    {

        // insert data ke table tbproduktambahproduk

        $file = $request->file('gambar');
        $filename = $request->nama . "." . $file->getClientOriginalExtension();
        $file->move(public_path('/img'), $filename);
        DB::table('produk')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
            'gambar' => $filename,
        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/produk');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $produk = DB::table('produk')->where('id', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/produk');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('produk')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'tipe'=>$request->tipe,
            'jenis'=>$request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/produk');
    }

    public function delete($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        DB::table('produk')->where('id', $id)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/produk');
    }

    public function search(Request $request){
        if($request->has('search')){
            $laptop = DB::table('laptop')->where('nama','LIKE','%'.$request->search.'%');
        }
        else{
              $laptop = DB::table('laptop')->get();


        }

        return view('laptop', ['laptop' => $laptop]);
    }
}
