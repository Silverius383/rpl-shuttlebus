@extends('layouts.header')

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">DashBoard</h1>
<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total Pesanan</a></div>
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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total Bus</a></div>
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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total Jadwal</a></div>
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
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="">Total Stasiun</a></div>
            <div class="h2 mb-0 font-weight-bold text-gray-800 ">
             {{ $stasiun->count() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>
@endsection