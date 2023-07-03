<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function produk(){
        return $this->belongsTo(Produk::class);
    }
    public function pembayaran(){
        return $this->hasOne(Pembayaran::class);
    }
}
