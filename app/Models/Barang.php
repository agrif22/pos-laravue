<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";
    protected $fillable = [
        'nama','barcode','satuan','harga_beli','harga_jual','stok','id_suplier','id_kategori'
    ];

    public function pemasok(){
        return $this->belongsTo('Suplier','id_suplier');
         
    }
    public function kategori(){
        return $this->belongsTo('Kategori','id_kategori');
         
    }
    
}
