{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle" align="center">
                    <i class="glyphicon glyphicon-log-in">Add New Schedule</i>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('bus-schedule.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customer_id">Stations</label>
                                    <div class="form-group">
                                        <select name="pickup_address" id="pickup_address" class="form-control">
                                            <option value="0" selected="true" disabled="true">Pilih Stasiun Penjemputan
                                            </option>
                                            @foreach ($stations as $station)
                                            <option value="{{$station->name}}">{{$station->name}}</option>
                                            @endforeach
                                        </select>
                                        <select name="dropoff_address" id="dropoff_address" class="form-control">
                                            <option value="0" selected="true" disabled="true">Pilih Stasiun Akhir
                                            </option>
                                            @foreach ($stations as $station)
                                            <option value="{{$station->name}}">{{$station->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="bus_id" id="bus_id" class="form-control">
                                        <option value="0" selected="true" disabled="true">Pilih Bus</option>
                                        @foreach ($buses as $bus)
                                        <option value="{{$bus->bus_id}}">{{$bus->bus_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                    <input name="price" rows="2" cols="20" class="form-control"
                                        placeholder="Enter Price" type="number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input name="status" aria-describedby="emailHelp" type="checkbox">
                                    <label>Institusi</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depart_date">Tanggal berangkat</label>
                                    <input name="depart_date" id="depart_date" class="form-control"
                                        aria-describedby="emailHelp" placeholder="Enter Depart Date" type="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depart_time">Waktu berangkat</label>
                                    <input name="depart_time" id="depart_time" rows="2" cols="20" class="form-control"
                                        placeholder="Enter Depart Time" type="time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="return_date">Tanggal kembali</label>
                                    <input name="return_date" id="return_date" class="form-control"
                                        aria-describedby="emailHelp" placeholder="Enter Return Date" type="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="return_time">Waktu Kembali</label>
                                    <input name="return_time" id="return_time" rows="2" cols="20" class="form-control"
                                        placeholder="Enter Return Time" type="time">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> -->
                        <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                        <!-- <textarea name="pickup_address"  class="form-control" aria-describedby="emailHelp"
                                        placeholder="Enter Pickup Address" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> -->
                        <!-- <label for="exampleInputPassword1">Seat No</label> -->
                        <!-- <textarea name="dropoff_address" rows="2" cols="20" class="form-control" 
                                        placeholder="Enter Dropoff Address" type="text"></textarea>
                                    </div>
                                </div>
                            </div> -->
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Register Jadwal</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
$('depart_date').datetimepicker({
    format: 'YY-MM-DD'
});
$('return_date').datetimepicker({
    format: 'YY-MM-DD'
});
$('.datepicker').datepicker()
</script>
@endsection