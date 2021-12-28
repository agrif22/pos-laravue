<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datas = Barang::join('supliers','supliers.id','=','barangs.id_suplier')
        // ->join('kategoris','kategoris.id','=','barangs.id_kategori')
        // ->get();
        $datas= DB::table('barangs')
                // ->select('barangs.id','nama','barcode','satuan','harga_beli','harga_jual','stok','id_suplier','id_kategori','nama_suplier','nama_kategori')
                ->select('barangs.*','nama_kategori','nama_suplier')
                ->join('supliers','supliers.id','=','barangs.id_suplier')
                ->join('kategoris','kategoris.id','=','barangs.id_kategori')
                ->get();
        $datatables = datatables()->of($datas)->addIndexColumn();
        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'barcode' => ['required'],
            'nama' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'stok' => ['required'],
            'satuan' => ['required'],

        ]);
        Barang::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
            'barcode' => ['required'],
            'nama' => ['required'],
            'harga_beli' => ['required'],
            'harga_jual' => ['required'],
            'stok' => ['required'],
            'satuan' => ['required'],

        ]);
        $barang->update($request->all());
        // $barang = new Barang;
        // $barang->barcode = $request->barcode;
        // $barang->nama = $request->nama;
        // $barang->harga_beli = $request->harga_beli;
        // $barang->harga_jual = $request->harga_jual;
        // $barang->satuan = $request->satuan;
        // $barang->stok = $request->stok;
        // $barang->id_suplier = $request->id_suplier;
        // $barang->id_kategori = $request->id_kategori;
        // $barang->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return back();
    }
}
