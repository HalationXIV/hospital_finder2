@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        @if(count($insurances) > 0)
        <div class="col-sm-6 col-md-pull-1">
            <div class="panel panel-default container-fluid">
                <div class="panel-heading row">
                    <h4>Insurance List of {{$hospital->hospital_name}}</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($insurances as $insurance)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>{{$insurance->insurance_name}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{URL::to('/insurance_images/'.$insurance->insurance_image)}}" class="img_hospital_detail">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Email </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$insurance->insurance_email}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Address </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$insurance->insurance_address}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Website </label>
                                            </div>
                                            <div class="col-sm-8">
                                                @if($insurance->insurance_website == "") -
                                                @else {{$insurance->insurance_website}}
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Phone </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$insurance->insurance_phone}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @if(count($doctors) > 0)
        <div class="col-sm-6">
            <div class="panel panel-default container-fluid">
                <div class="panel-heading row">
                    <h4>Doctor List of {{$hospital->hospital_name}}</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($doctors as $doctor)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>{{$doctor->doctor_name}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{URL::to('/doctor_images/'.$doctor->doctor_image)}}" class="img_hospital_detail">
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Email </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$doctor->doctor_email}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Address </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$doctor->doctor_address}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Gender </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$doctor->doctor_gender}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Phone </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$doctor->doctor_phone}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Specialist </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$doctor->specialist_name}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Practice Hours </label>
                                            </div>
                                            <div class="col-sm-8">
                                                {{$doctor->practice_hours}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        </div>
    </div>
</div>

@endsection