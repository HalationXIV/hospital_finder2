@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        Manage Doctors
                    </div>
                    <div class="panel-body row">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/addDoctor')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group form-group-sm">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('doctor_image') ? ' has-error' : '' }}">
                                            <label for="doctor_image" class="col-md-4 control-label">Doctor Picture</label>
                                            <div class="col-md-6">
                                                <div id="imageHolder"></div>
                                                <input id="doctor_image" type="file" class="form-control" name="doctor_image">
                                                @if ($errors->has('doctor_image'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('doctor_image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('specialist_type') ? ' has-error' : '' }}">
                                            <label for="specialist_type" class="col-md-4 control-label">Specialist Type</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="specialist_type" name="specialist_type">
                                                    <option value="0">Choose</option>
                                                    @foreach($specialist_types as $specialist_type)
                                                        <option value="{{$specialist_type->id}}">{{$specialist_type->specialist_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('specialist_type'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('specialist_type') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('doctor_name') ? ' has-error' : '' }} ">
                                            <label for="doctor_name" class="col-md-4 control-label">Doctor Name</label>

                                            <div class="col-md-6">
                                                <input id="doctor_name" type="text" class="form-control" name="doctor_name" value="{{ old('doctor_name') }}">

                                                @if ($errors->has('doctor_name'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('doctor_name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('doctor_email') ? ' has-error' : '' }} ">
                                            <label for="doctor_email" class="col-md-4 control-label">Doctor Email</label>

                                            <div class="col-md-6">
                                                <input id="doctor_email" type="text" class="form-control" name="doctor_email" value="{{ old('doctor_email') }}">

                                                @if ($errors->has('doctor_email'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('doctor_email') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('doctor_address') ? ' has-error' : '' }} ">
                                            <label for="doctor_address" class="col-md-4 control-label">Doctor Address</label>

                                            <div class="col-md-6">
                                                <input id="doctor_address" type="text" class="form-control" name="doctor_address" value="{{ old('doctor_address') }}">

                                                @if ($errors->has('doctor_address'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('doctor_address') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('doctor_gender') ? ' has-error' : '' }}">
                                            <label for="doctor_gender" class="col-md-4 control-label">Doctor Gender</label>

                                            <div class="col-md-6">
                                                <label class="radio-inline"><input id="male" type="radio" name="doctor_gender" value="male"> Male</label>
                                                <label class="radio-inline"><input id="female" type="radio" name="doctor_gender" value="female"> Female</label>

                                                @if ($errors->has('doctor_gender'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('doctor_gender') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('doctor_phone') ? ' has-error' : '' }} ">
                                            <label for="doctor_phone" class="col-md-4 control-label">Doctor Phone</label>

                                            <div class="col-md-6">
                                                <input id="doctor_phone" type="text" class="form-control" name="doctor_phone" value="{{ old('doctor_phone') }}">

                                                @if ($errors->has('doctor_phone'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('doctor_phone') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-danger">
                                                    Add Doctor
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <ul>
                                @foreach($doctors as $doctor)
                                    <li>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <img src="{{URL::to('/doctor_images/'.$doctor->doctor_image)}}" class="img_hospital text-center">
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$doctor->doctor_name}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$doctor->doctor_address}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$doctor->doctor_phone}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$doctor->doctor_email}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text-center">
                                                    <a href="{{url('/updateDoctorPage/'.$doctor->id)}}"><button class="btn-danger btn">Update</button></a>
                                                </div>
                                                <div class="col-sm-6 text-center">
                                                    <a href="{{url('/deleteDoctor/'.$doctor->id)}}"><button class="btn-danger btn">Delete</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row">
                            <div class="text-center">{{$doctors->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection