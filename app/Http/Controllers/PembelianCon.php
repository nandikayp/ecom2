<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class PembelianCon extends Controller
{
      public function index()
    {





        $pembelian = DB::table('pembelian')
        ->select('pembelian.*','produk.nama','produk.gambar','users.name',)
        ->join('users','users.id', '=' , 'pembelian.kode_pembeli')
        ->join('produk','kode_produk', '=' , 'produk.id')

        ->get();




        return view('pembelian', ['pembelian' => $pembelian]);
    }


    public function input()
    {
        return view('tambahpembelian');
    }

    public function storeinput(Request $request)
    {
        // insert da    sta ke table tbproduktambahproduk
        DB::table('pembelian')->insert([
            'id' => $request->id,
            'kode_produk' => $request->kodeproduk,
            'banyak' => $request->banyak,
            'bayar' => $request->harga * $request->banyak,
            'kode_pembeli' => auth()->user()->id,
            'status' => 'verifikasi'

        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/pembelian');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $pembelian = DB::table('pembelian')->where('id', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/pembelian');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('pembelian')->where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/pembelian');
    }

    public function delete($id)
    {

        // mengambil data produk berdasarkan id yang dipilih
        DB::table('pembelian')->where('id', $id)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/pembelian');

    }
    public function updatepembelian($id,Request $request){
        DB::table('pembelian')->where('id', $id)->update([
            "status" => $request->status
        ]);
        return redirect()->back();
    }
}
