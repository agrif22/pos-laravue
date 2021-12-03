<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    protected $table = "supliers";
    protected $fillable = [
        'nama_suplier',
        'telp',
        'alamat'
    ];

    public function barang(){
        return $this->hasMany('Barang','id_suplier');
    }
}
