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
            <button class="btn btn-primary" id="simpan">Simpan</button>
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
</script>

@endpush