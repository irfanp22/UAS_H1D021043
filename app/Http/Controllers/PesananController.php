<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index(){
        $data = Pesanan::where('pelanggan_id', Auth::id())->get();
        return view('dashboard')->with('data', $data);
    }
    public function create(){
        return view('tambah')->with('data', '');
    }
}
