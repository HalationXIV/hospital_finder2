@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <form class="form-horizontal" method="POST" action="{{url('/searchHospital')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-4">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        <div class="col-sm-8">
                            <h4>Categories</h4>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-danger">
                                Search
                            </button>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($specialist_types as $specialist_type)
                            <div class="checkbox">
                                <label><input type="checkbox" value="{{$specialist_type->id}}" name="specialist_type[]" id="specialist_type">{{$specialist_type->specialist_name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
        @if(count($hospitals) > 0)
        <div class="col-sm-8">
            <ul class="list-group">
                @foreach($hospitals as $hospital)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>{{$hospital->hospital_name}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{URL::to('/hospital_images/'.$hospital->hospital_image)}}" class="img_hospital">
                        </div>

                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Location </label>
                                </div>
                                <div class="col-sm-10">
                                    {{$hospital->hospital_address}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Open </label>
                                </div>
                                <div class="col-sm-10">
                                    {{$hospital->hospital_open_hours}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Phone </label>
                                </div>
                                <div class="col-sm-10">
                                    {{$hospital->hospital_phone}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Email </label>
                                </div>
                                <div class="col-sm-10">
                                    {{$hospital->hospital_email}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Website </label>
                                </div>
                                <div class="col-sm-10">
                                    @if($hospital->hospital_website == "") -
                                    @else {{$hospital->hospital_website}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{url('/hospital_detail/'.$hospital->id)}}">Detail</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        @else
        <div class="col-sm-8">
            <h3>No hospital available</h3>
        </div>
        @endif
    </div>
</div>

@endsection