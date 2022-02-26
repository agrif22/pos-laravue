@extends('layouts.admin')
@section('header','Transaksi Pembelian')
@section('title','Transaksi Pembelian')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" >
@endpush

@section('content')
<component id="controller">
    <div class="row mb-4">
         {{-- Form Pertama --}}
         <div class="col-lg-6">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        {{-- Input Tanggal --}}
                        @csrf
                     <input type="hidden" name="_method" value="PUT">
                        <tr>
                            <td>
                                <label for="tanggal">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="" id="tanggal" value="dd/mm/yyyy" class="form-control">
                                </div> 
                            </td>
                        </tr>

                        {{-- Input Karyawan/Kasir --}}
                        <tr>
                            <td style="vertical-align: top; width:20%">
                                <label for="karyawan">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="id_karyawan"  class="form-control">
                                        <option value="">-- Pilih Kasir --</option>
                                            @foreach ($data['karyawan'] as $karyawan)
                                                <option :selected="data.id_karyawan == {{ $karyawan['id'] }} " value = "{{ $karyawan['id'] }}"> {{ $karyawan['nama_karyawan'] }} </option>
                                            @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>

                        {{-- Input Suplier --}}
                        <tr>
                            <td style="vertical-align: top; width:20%">
                                <label for="suplier">Suplier</label>
                            </td>
                            <td>
                                <select id="suplier" class="form-control">
                                   <option value="">-- Pilih Suplier --</option>
                                   @foreach ($data['suplier'] as $suplier)
                                                <option :selected="data.id_suplier == {{ $suplier['id'] }} " value = "{{ $suplier['id'] }}"> {{ $suplier['nama_suplier'] }} </option>
                                            @endforeach
                                </select>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>        
        </div>
        {{-- / Form Pertama --}}
   
    
    
        {{-- Form Kedua --}}
    <div class="col-lg-6">
        <div class="box box-widget">
            <div class="box-body">
                <div align="right">
                    <h4> Invoice <b><span id="invoice">MP190925001</span></b></h4>
                    <h1><b><span id="grand_total2" style="font-size: 80pt">0</span></b></h1>
                </div>
            </div>
        </div>
    {{-- /Form Kedua --}}
    </div>
    </div>
    <div>
        <div class="col-md-12 flex">
            <table class="table table-striped text-center" width="100%" id="tabel1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td contenteditable="true" class="nama"></td>
                        <td contenteditable="true" class="harga"></td>
                        <td contenteditable="true" class="qty"></td>
                        <td contenteditable="true" class="subtotal"></td>
                        <td> <button class="btn-sm btn-success text-center" id="btntambah"> + </button> <button class="btn-sm btn-danger" id="btnhapus"> - </button> </td>
    
                    </tr>
                </thead>
            </table>
            <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
        </div>
        
    </div>
        

    

</component>  
@endsection

@push('js')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
{{-- Data Picker --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
      let baris = 1

      $(document).on('click','#btntambah', function(){
          baris = baris + 1
          var html = "<tr id= 'baris' "+baris+" >"
                html += "<td>"+ baris+"</td>"
                html += "<td contentedittable='true' class='nama'></td>"
                html += "<td contentedittable='true' class='harga'></td>"
                html += "<td contentedittable='true' class='qty'></td>"
                html += "<td contentedittable='true' class='subtotal'></td>"
                html += '<td> <button class="btn-sm btn-success text-center" id="btntambah"> + </button> <button class="btn-sm btn-danger" data-row="baris"'+baris+' id="btnhapus"> - </button> </td>'
                html += " </td>"

                $("#tabel1").append(html)
      })
  })

  $(document).on('click','#btnhapus' , function(){
      let hapus = $(this).data('row')
      $('#' + hapus).remove()
  })

  $( function() {
    $( "#tanggal" ).datepicker({format:"dd-mm-yyyy"});
  } );
</script>

@endpush