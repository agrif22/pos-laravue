<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Suplier;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function index()
    {
        return view('home');
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


}
