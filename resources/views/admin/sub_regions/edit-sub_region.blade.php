@include('layouts.app')
@include('admin.message')

{{-- <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Update Sub Region</i></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">



        {!! Form::open(['action' => ['Sub_RegionController@update', $sub_region->sub_region_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

        {{ csrf_field() }}
        <fieldset>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <input value="{{ $sub_region->sub_region_name }}" name="sub_region_name" id="sub_region_name" class="form-control" aria-describedby="emailHelp"
                    placeholder="Enter Sub Region Name" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <input value="{{$sub_region->sub_region_code}}" name="sub_region_code" id="sub_region_code" class="form-control" aria-describedby="emailHelp" 
                    placeholder="Enter Sub Region Code" type="text">
                </div>
            </div>
                <div class="col-md-3">
                    <div class="form-group">
                            <select name="region_id" class="form-control">
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                                @endforeach
                            </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <input value="{{$sub_region->status}}" name="status"  aria-describedby="emailHelp" type="checkbox">
                        <label for="exampleInputEmail1">Active</label>
                    </div>
                    </div>            
        </fieldset>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Sub Region</button>
        {{Form::hidden('_method','PUT')}}
        {!! Form::close() !!}



        {{-- <form method="put" action="/operator/{{ $operator->operator_id }}" enctype="multipart/form-data"> --}}
        {{-- <form method="post" action="/store" enctype="multipart/form-data"> --}}

        
        {{-- </form>  --}}
        </div>
    </div>
    </div>
{{-- </div> --}}

