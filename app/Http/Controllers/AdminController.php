<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Suplier;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function index()
    {
        $total_barang = Barang::count();
        $total_pelanggan = Pelanggan::count();
        $total_suplier = Suplier::count();
        $total_kategori = Kategori::count();

        return view('home', compact('total_barang','total_pelanggan','total_suplier', 'total_kategori'));
    }

    public function kategori()
    {
       $data_kategori = Kategori::all();
       return view('admin.kategori' , compact('data_kategori'));
    }
    
    public function suplier()
    {
       $data_suplier = Suplier::all();
       return view('admin.suplier' , compact('data_suplier'));
    }

    public function karyawan()
    {
       $data_karyawan = Karyawan::all();
       return view('admin.karyawan' , compact('data_karyawan'));
    }

    public function pelanggan()
    {
       $data_pelanggan = Pelanggan::all();
       return view('admin.pelanggan' , compact('data_pelanggan'));
    }

    public function barang()
    {
        $data_barang = DB::table('barangs')
                        ->select('*')
                        ->join('supliers','supliers.id','=','barangs.id_suplier')
                        ->join('kategoris','kategoris.id','=','barangs.id_kategori')
                        ->get();
        $data['kategori']= Kategori::all();
        $data['suplier']= Suplier::all();
        return view('admin.barang', compact('data','data_barang'));

    }

    public function pembelian()
    {
        $data_pembelian = DB::table('pembelians')
                        ->select('pembelians.*')
                        ->join('detail_pembelians','detail_pembelians.id_pembelian','=','pembelians.id')
                        ->get();
        $data['karyawan']= Karyawan::all();
        $data['suplier']= Suplier::all();
        // return [$data , $data_pembelian];
        return view('admin.pembelian', compact( 'data' , 'data_pembelian'));

    }

    public function detailpembelian(){
        $data['karyawan']= Karyawan::all();
        $data['suplier']= Suplier::all();
        // return $data;

        return view('admin.detailpembelian', compact('data'));
    }


}
