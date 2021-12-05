@extends('layouts.admin')
@section('header','Home')
@section('title','Home')
@section('content')
    {{-- Data Total Buku Anggota Pengarang Penerbit --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_barang }}</h3>

                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <a href="{{  url('barang') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_pelanggan }}</h3>

                    <p>Total Pelanggan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ url('pelanggan') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_suplier }}</h3>

                    <p>Data Suplier</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <a href="{{ url('suplier') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_kategori }}</h3>

                    <p>Data Kategori</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <a href="{{url('kategori')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
     <!-- .container-fluid -->
     {{-- -------------------------------------------- --}}

@endsection
{{-- <script src="{{ asset('plugins\jquery\jquery.min.js') }}"></script> --}}
{{-- <script src="{{ asset('plugins\chart.js\Chart.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
