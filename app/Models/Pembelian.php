<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = "detail_pembelians";

    protected $fillable = [
        'tgl_transaksi',
        'id_pelanggan',
        'id_karyawan',
        'status',
        'payment'
    ];

    public function pemasok(){
        return $this->belongsTo('Pemasok','id_pemasok');
    }

    public function pegawai(){
        return $this->belongsTo('Karyawan','id_karyawan');
    }

    public function barang(){
        return $this->belongsToMany('Barang','detail_pembelians','id_pembelian','id_barang');
    }

    public function detailpembelian(){
        return $this->hasOne('DetailPembelian','id_pembelian');
    }
}
