@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        Manage Insurance
                    </div>
                    <div class="panel-body row">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/addInsurance')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group form-group-sm">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('insurance_image') ? ' has-error' : '' }}">
                                            <label for="insurance_image" class="col-md-4 control-label">Insurance Picture</label>
                                            <div class="col-md-6">
                                                <div id="imageHolder"></div>
                                                <input id="insurance_image" type="file" class="form-control" name="insurance_image">
                                                @if ($errors->has('insurance_image'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('insurance_image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('insurance_name') ? ' has-error' : '' }} ">
                                            <label for="insurance_name" class="col-md-4 control-label">Insurance Name</label>

                                            <div class="col-md-6">
                                                <input id="insurance_name" type="text" class="form-control" name="insurance_name" value="{{ old('insurance_name') }}">

                                                @if ($errors->has('insurance_name'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('insurance_name') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_website') ? ' has-error' : '' }} ">
                                            <label for="insurance_website" class="col-md-4 control-label">Insurance Website</label>

                                            <div class="col-md-6">
                                                <input id="insurance_website" type="text" class="form-control" name="insurance_website" value="{{ old('insurance_website') }}">

                                                @if ($errors->has('insurance_website'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('insurance_website') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_address') ? ' has-error' : '' }} ">
                                            <label for="insurance_address" class="col-md-4 control-label">Insurance Address</label>

                                            <div class="col-md-6">
                                                <input id="insurance_address" type="text" class="form-control" name="insurance_address" value="{{ old('insurance_address') }}">

                                                @if ($errors->has('insurance_address'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('insurance_address') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_phone') ? ' has-error' : '' }} ">
                                            <label for="insurance_phone" class="col-md-4 control-label">Insurance Phone</label>

                                            <div class="col-md-6">
                                                <input id="insurance_phone" type="text" class="form-control" name="insurance_phone" value="{{ old('insurance_phone') }}">

                                                @if ($errors->has('insurance_phone'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('insurance_phone') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_email') ? ' has-error' : '' }} ">
                                            <label for="insurance_email" class="col-md-4 control-label">Insurance Email</label>

                                            <div class="col-md-6">
                                                <input id="insurance_email" type="text" class="form-control" name="insurance_email" value="{{ old('insurance_email') }}">

                                                @if ($errors->has('insurance_email'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('insurance_email') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-danger">
                                                    Add Insurance
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <ul>
                                @foreach($insurances as $insurance)
                                    <li>
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <img src="{{URL::to('/insurance_images/'.$insurance->insurance_image)}}" class="img_hospital text-center">
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$insurance->insurance_name}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$insurance->insurance_address}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$insurance->insurance_phone}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">{{$insurance->insurance_email}}</div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">@if($insurance->insurance_website == "") - @else{{$insurance->insurance_website}}@endif</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text-center">
                                                    <a href="{{url('/updateInsurancePage/'.$insurance->id)}}"><button class="btn-danger btn">Update</button></a>
                                                </div>
                                                <div class="col-sm-6 text-center">
                                                    <a href="{{url('/deleteInsurace/'.$insurance->id)}}"><button class="btn-danger btn">Delete</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row">
                            <div class="text-center">{{$insurances->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection