<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembayaran;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggan_id',
        'produk_id',
    ];
    protected static function booted()
    {
        static::created(function () {
            $pesanan = Pesanan::orderByDesc('id')->first();
            $baru = [
                'pesanan_id' => $pesanan->id,
            ];
            Pembayaran::insert($baru);
        });
    }
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
