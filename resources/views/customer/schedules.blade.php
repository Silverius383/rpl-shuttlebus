<div class="card mb-3">
    <img src="https://pusatsewabus.com/wp-content/uploads/2018/12/bus-super-high-deck.jpg" height="500px"
        class="card-img-top">
    <div class="card-body">
        <h2 class="card-title">Jadwal Bus</h2>
        <p class="card-text">Cek Jadwal anda disini.</p>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama Bus</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Tanggal Keberangkatan</th>
                    <th scope="col">Waktu Keberangkatan</th>
                    <th scope="col">Harga per kursi</th>
                    <th scope="col">Contact Person</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $key => $schedule)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>
                        @foreach ($buses as $bus)
                        @if ($bus->bus_id == $schedule->bus_id)
                        {{ $bus->bus_name }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{$schedule->pickup_address}}</td>
                    <td>{{$schedule->dropoff_address}}</td>
                    <td>{{$schedule->depart_date}}</td>
                    <td>{{$schedule->depart_time}}</td>
                    <td>{{ $schedule->price }}</td>
                    <td>
                        @foreach ($buses as $bus)
                        @if ($bus->bus_id == $schedule->bus_id)
                        {{ $bus->phone }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                        <p class="card-text">@if($schedule->status == 1)
                            Institusi
                            @else
                            Personal
                            @endif</p>
                    </td>
                    <td>
                        <a href="{{ url('/home/booking/'.$schedule->schedule_id) }}" type="button"
                            class="btn btn-sm btn-primary">
                            <i class="glyphicon glyphicon-plus"></i>Pesan
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/home')}}" class="btn btn-primary a-btn-slide-text">
            <span aria-hidden="true">Manual Search</span>
        </a>
    </div>
</div>