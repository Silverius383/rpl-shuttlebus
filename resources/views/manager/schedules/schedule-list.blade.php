@extends('layouts.headermg')
@section('content') 
@include('manager.message')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <span class="pull-center">
            <a href="#" data-toggle="modal" data-target="#addSchedule" 
            data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
            <i class="glyphicon glyphicon-plus"></i> Tambah Jadwal Baru</a>
            </span>
            <br>
            <br>
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Daftar Jadwal</h4>
                  <h4 class="card-title pull-right">{{ date('d-m-Y', time()) }}</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  @if (count($schedules) > 0 ) 
                    <table class="col-md-12">
                      <thead class="text-primary">
                        <th>ID</th>
                        <th>Nama Bus</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Checkpoints</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Tanggal Kembali</th>
                        {{-- <th>Waktu Kembali</th>
                        <th>Tanggal Pemesanan</th> --}}
                        {{-- <th>Total Harga</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                    <tbody>
                    @foreach ( $schedules as $key => $schedule )
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                          @foreach ($buses as $bus)
                            @if ($bus->bus_id == $schedule->bus_id)
                                {{ $bus->bus_name }}
                            @endif
                        @endforeach</td>
                        <td>{{ $schedule->pickup_address }}</td>
                        <td>{{ $schedule->dropoff_address }}</td>
                        <td>{{ $schedule->pickup_address }} {{ $schedule->dropoff_address }}
                        </td>
                        <td>{{ $schedule->depart_date }}</td>
                        <td>{{ $schedule->depart_time }}</td>
                        <td>{{ $schedule->return_date }}</td>
                        {{-- <td>{{ $schedule->return_time }}</td>
                        <td>{{ $schedule->created_at }}</td> --}}
                        {{-- <td>{{ $schedule->price }}</td> --}}
                        <td>@if($schedule->status == 1)
                          Institusi
                        @else
                          Personal
                        @endif
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#scheduleView{{$schedule->schedule_id}}" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                          <i class="glyphicon glyphicon-plus"></i>View</a>
                  @include('manager.schedules.schedule-view')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              @endif 
                 </div>
                </div>
                {!! $schedules->render() !!}
              </div>
            </div>
            </div>
            </div>
            </div>
            @include('admin.schedules.add-schedule')
@endsection