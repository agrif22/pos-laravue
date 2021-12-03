<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualans";
    protected $fillable = [
        'tgl_transaksi',
        'id_pelanggan',
        'id_karyawan',
        'status',
        'payment'
    ];

    public function pelanggan(){
        return $this->belongsTo('Pelanggan','id_pelanggan');
    }

    public function pegawai(){
        return $this->belongsTo('Karyawan','id_karyawan');
    }

    public function barang(){
        return $this->belongsToMany('Barang','detail_penjualans','id_penjualan','id_barang');
    }

    public function detailpenjualan(){
        return $this->hasOne('DetailPenjualan','id_penjualan');
    }
}
