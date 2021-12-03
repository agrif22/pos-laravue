<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table ="detail_penjualans";
    protected $fillable = [
        'id_penjualan',
        'id_barang',
        'harga_barang',
        'qty'
    ];


    public function penjualan(){
        return $this->belongsTo('Penjualan','id_penjualan');
    }
}
