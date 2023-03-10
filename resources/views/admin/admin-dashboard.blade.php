@extends('layouts.header')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold">DashBoard</h1>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Transaksi</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $book->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Bus</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $buses->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Jadwal</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $jadwal->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Stasiun</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $stasiun->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Jadwal Luar Kota</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $luar->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Jadwal Dalam Kota</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $dalam->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                    Jadwal Institusi</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                {{ $institut->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Cetak
                                    Transaksi Per Area</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                <div>
                                    <a href="/admin/viewarea" class="btn btn-md btn-info">view</a>

                                    <a href="/admin/downloadarea" class="btn btn-md btn-info">Download</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <form method="post" action="{{ url('/admin/tanggal') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                        href="">Masukkan
                                        Tanggal</a></div>
                                <div class="col-md-5 form-group">
                                    <label for="waktuawal">Tanggal Awal</label>
                                    <input name="waktuawal" id="waktuawal" class="form-control"
                                        aria-describedby="emailHelp" type="date">
                                    <label for="waktuakhir">Tanggal Akhir</label>
                                    <input name="waktuakhir" id="waktuakhir" class="form-control"
                                        aria-describedby="emailHelp" type="date">
                                    <button type="submit" class="btn btn-success">Cari</button>

                                </div>
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                        Transaksi per periode</a></div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                    {{ $data->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <form method="post" action="{{ url('/admin/rute')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                        href="">Masukkan Rute</a></div>
                                <div>
                                    <div class="form-group">
                                        <select name="rute" id="rute" class="form-control" required>
                                            @foreach ($jadwal as $list)
                                            <option value="{{$list->schedule_id}}">
                                                {{$list->pickup_address}}-{{$list->dropoff_address}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div >
                                        <button type="submit" class="btn btn-success">Cari</button>
                                    </div>
                                </div>
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                        Transaksi per Rute</a></div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                    {{ $perrute->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <form method="post" action="{{ url('/admin/institusi')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                                        href="">Masukkan Kota</a></div>
                                <div>
                                    <div class="form-group">
                                        <select name="kota" id="kota" class="form-control" required>
                                            @foreach ($stasiun as $list)
                                            <option value="{{$list->name}}">
                                                {{$list->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <button type="submit" class="btn btn-success">Cari</button>
                                    </div>
                                </div>
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total
                                        Institusi per Kota</a></div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                    {{ $perkota->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow  py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Cetak
                                    Transaksi Per Bulan</a></div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
                                <div>
                                    <a href="/admin/viewwaktu" class="btn btn-md btn-info">view</a>

                                    <a href="/admin/downloadwaktu" class="btn btn-md btn-info">Download</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection