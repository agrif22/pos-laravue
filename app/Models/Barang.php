<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    protected $fillable = [
        'nama','barcode','satuan','harga_beli','harga_jual','stok','id_suplier','id_pelanggan'
    ];

    public function pemasok(){
        return $this->belongsTo('Pemasok','id_pemasok');
         
    }
    public function kategori(){
        return $this->belongsTo('Kategori','id_kategori');
         
    }
}
