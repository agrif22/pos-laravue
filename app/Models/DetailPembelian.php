<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;
    protected $table = "detail_pembelians";
    protected $fillable = [
        'id_pembelian',
        'id_barang',
        'harga_barang',
        'qty',
        'subtotal'
    ];


    public function pembelian(){
        return $this->belongsTo('Pembelian','id_pembelian');
    }
}
