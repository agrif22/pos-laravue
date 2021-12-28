@extends('layouts.admin')
@section('header','Pembelian')
@section('title','Pembelian')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" >
@endpush

@section('content')
<component id="controller">
    <div class="card">
        <div class="card-header">
            <a href={{ url('detailpembelian')}} class='btn btn-sm btn-primary pull-right'>Tambah Transaksi</a>
        </div>
        <div class="card-body">
            <table id=datatable class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Suplier</th>
                        <th>Petugas</th>
                        <th>Status Pembayaran</th>
                        <th>Payment</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
  <!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
    <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
    <div class="modal-header">
        <h4 class="modal-title" v-if="!editStatus">Tambah Pembelian</h4>
        <h4 class="modal-title" v-if="editStatus">Edit pembelian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @csrf
        <input type="hidden" name="_method" value="PUT" v-if = "editStatus">
        <div class="container">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Tanggal</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" :value="data.tgl_transaksi" id="tanggaltransaksi" name="tgl_transaksi"  required="" placeholder="Pinjam">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Suplier</label>
                    </div>
                    <div class="col-md-9">
                        <select name="id_anggota" class="form-control">
                            <option value="">-- Suplier --</option>
                                @foreach ($data['suplier'] as $suplier)
                                    <option :selected="data.id_suplier == {{ $suplier['id'] }} " value = "{{ $suplier['id'] }}"> {{ $suplier['nama_suplier'] }} </option>
                                @endforeach
                        </select>
                    </div>
                </div>    
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Petugas</label>
                    </div>
                    <div class="col-md-9">
                        <select name="id_anggota" class="form-control">
                            <option value="">-- Petugas --</option>
                                @foreach ($data['karyawan'] as $karyawan)
                                    <option :selected="data.id_karyawan == {{ $karyawan['id'] }} " value = "{{ $karyawan['id'] }}"> {{ $karyawan['nama_karyawan'] }} </option>
                                @endforeach
                        </select>
                    </div>
                </div>    
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Jenis Kelamin</label>
                    </div>
                    <div class="col-md-9">
                        <select name="status" class="form-control">
                            <option :selected="data.status == '1'" value="1">Lunas</option>
                            <option :selected="data.status == '2'" value="2">Belum Lunas</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label>Payment</label>
                    </div>
                    <div class="col-md-9">
                        <select name="payment" class="form-control">
                            <option :selected="data.payment == '1'" value="1">CASH</option>
                            <option :selected="data.payment == '2'" value="2">NON CASH</option>
                        </select>
                    </div>
                </div>    
            </div>    
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
    
        </form>
    </div>
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
  var actionUrl= '{{ url("data/pembelian") }}';
  var columns = [
      {data: 'tgl_transaksi', class: 'text-center', orderable: true},
      {data: 'nama_suplier', class: 'text-center', orderable: true},
      {data: 'nama_karyawan', class: 'text-center', orderable: true},
      {data: 'status', class: 'text-center', orderable: true},
      {data: 'payment', class: 'text-center', orderable: true},
      {render: function(index, row, data, meta){
      return ` <a href="#" class="btn btn-sm btn-warning" onclick="controller.ubahData(event,${meta.row})">Edit</a> <a href="#" class="btn btn-sm btn-danger" onclick="controller.hapusData(event, ${data.id})">Delete</a> `;
            },orderable: false, class: 'text-center', width : '150px'
      }
  ];
  
</script>
<script src="{{ asset('js/data.js') }}"></script>
<script>
    $( function() {
    $( "#tanggaltransaksi" ).datepicker({format:"dd-mm-yyyy"});
   
  } );
</script>

@endpush