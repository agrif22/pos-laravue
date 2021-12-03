<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table ="karyawans";

    protected $fillable = [
        'nama_karyawan',
        'alamat',
        'telp',
        'jabatan'

    ];

    public function user(){
        return $this->hasOne('User','id_karyawan');
    }

    public function penjualan(){
        return $this->hasMany('Penjualan','id_karyawan');
    }

    public function pembelian(){
        return $this->hasMany('Pembelian','id_karyawan');
    }
}
