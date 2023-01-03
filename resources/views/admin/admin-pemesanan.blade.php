@extends('layouts.header')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">DashBoard</h1>
<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <table class="table">
            <thead class="thead-light">
            <tr>
            <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah Tiket Dipesan</th>
                <th scope="col">Aksi</th>
            </tr> 
            </thead>
            <tbody>
            @foreach ($data as $index => $value)
        <tr>
            <td>{{$index}}</td>
            <td>{{json_encode($value->tanggal)}}</td>
            <td>{{json_encode($value->jumlah)}}</td>
            <td> 
                    <div class="row " >
                        <div>
                        <a href="/admin/pesanan/downloadpdf" class="btn btn-sm btn-warning">download</a>
                        </div>                      
                    </div>
                  </td>
        </tr>
    @endforeach
            </tbody>
        </table>

</div>

</div>
@endsection