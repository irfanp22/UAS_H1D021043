<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index(){
        $data = Pesanan::where('pelanggan_id', Auth::id())->get();
        return view('dashboard')->with('data', $data);
    }
    public function create(){
        $produk = Produk::get();
        return view('tambah')->with(['data'=>'', 'prod'=>$produk]);
    }
    public function store(Request $request){
        $cek = Pesanan::create([
            'pelanggan_id' =>Auth::id(),
            'produk_id' => $request->produk
        ]);
        if($cek) return redirect()->route('dashboard');
        return redirect()->route('pesanan.create');
    }
    public function edit($id){
        $data = Pesanan::find($id);
        $data2 = Produk::get();
        return view('edit')->with(['data'=>$data, 'data2'=>$data2, 'prod'=>[]]);
    }
}
