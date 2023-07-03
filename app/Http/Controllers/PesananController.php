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
    public function update(Request $request, $id){
        $id = Pesanan::find($id);
        $data = [
            'produk_id'=>$request->produk
        ];
        $cek = $id->update($data);
        if($cek) return redirect()->route('dashboard');
        return redirect()->back();
    }
    public function status($id){
        $data = Pesanan::find($id);
        $stat = $data->pembayaran->status;
        $cek = ($stat == 1) ? $data->pembayaran->update(['status' => 0]) : $data->pembayaran->update(['status' => 1]);
        if ($cek) {
            return back();
        }
        return redirect()->route('dashboard');
    }
    public function destroy($id){
        $cek = Pesanan::find($id)->delete();
        if($cek) return back();
        return redirect()->route('dashboard');
    }
    public function show($id){
        if($id=='completed'){
            $data = Pesanan::whereHas('pembayaran', function ($query) {
                $query->where('status', 1);
            })
            ->where('pelanggan_id', Auth::id())
            ->get();
            return view('completed')->with('data', $data);
        }else{
            $data = Pesanan::whereHas('pembayaran', function ($query) {
                $query->where('status', 0);
            })
            ->where('pelanggan_id', Auth::id())
            ->get();
            return view('incomplete')->with('data', $data);
        }
    }
}
