@extends('layouts.admin')
@section('header','Barang')
@section('title','Barang')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
<component id="controller">
    <div class="card">
        <div class="card-header">
            <a href="#" @click="tambahData()" class='btn btn-sm btn-primary pull-right'>Tambah Barang</a>
        </div>
        <div class="card-body">
            <table id=datatable class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Suplier</th>
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
        @csrf
        <div class="modal-header">
            <h4 class="modal-title" v-if="!editStatus">Tambah Barang</h4>
            <h4 class="modal-title" v-if="editStatus">Edit Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @csrf
            <input type="hidden" name="_method" value="PUT" v-if = "editStatus">
            <div class="form-group">
                <label>Barcode</label>
                <input type="text" class="form-control" name="barcode" :value="data.barcode" required="">
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama" :value="data.nama" required="">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" id="" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                        @foreach ($data['kategori'] as $kategori)
                            <option :selected="data.id == {{ $kategori['id'] }} " value = "{{ $kategori['id'] }}"> {{ $kategori['nama_kategori'] }} </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="text" class="form-control" name="harga_beli" :value="data.harga_beli" required="">
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="text" class="form-control" name="harga_jual" :value="data.harga_jual" required="">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" class="form-control" name="stok" :value="data.stok" required="">
            </div>
            <div class="form-group">
                <label>Satuan</label>
                <input type="text" class="form-control" name="satuan" :value="data.satuan" required="">
            </div>
            <div class="form-group">
                <label>Suplier</label>
                <select name="id_suplier" id="" class="form-control">
                    <option value="">-- Pilih Suplier --</option>
                        @foreach ($data['suplier'] as $suplier)
                            <option :selected="data.id == {{ $suplier['id'] }} " value = "{{ $suplier['id'] }}"> {{ $suplier['nama_suplier'] }} </option>
                        @endforeach
                </select>
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
<script type="text/javascript">
  var actionUrl= '{{ url("data/barang") }}';
  var columns = [
      {data: 'barcode', class: 'text-center', orderable: true},
      {data: 'nama', class: 'text-center', orderable: true},
      {data: 'id_kategori', class: 'text-center', orderable: true},
      {data: 'harga_beli', class: 'text-center', orderable: true},
      {data: 'harga_jual', class: 'text-center', orderable: true},
      {data: 'stok', class: 'text-center', orderable: true},
      {data: 'satuan', class: 'text-center', orderable: true},
      {data: 'id_suplier', class: 'text-center', orderable: true},
      {render: function(index, row, data, meta){
      return ` <a href="#" class="btn btn-sm btn-warning" onclick="controller.ubahData(event,${meta.row})">Edit</a> <a href="#" class="btn btn-sm btn-danger" onclick="controller.hapusData(event, ${data.id})">Delete</a> `;
            },orderable: false, class: 'text-center', width : '150px'
      }
  ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endpush