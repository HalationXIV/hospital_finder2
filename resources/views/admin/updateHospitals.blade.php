@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        <div class="col-sm-4"><h3>Update Hospital</h3></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/updateHospital/'.$hospital->id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group form-group-sm">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('hospital_image') ? ' has-error' : '' }}">
                                            <label for="hospital_image" class="col-md-4 control-label">Hospital Picture</label>
                                            <div class="col-md-6">
                                                {{--<img src="{{URL::to('/images/'.$product->product_image)}}" class="product_image">--}}
                                                <div id="imageHolder"></div>
                                                <input id="hospital_image" type="file" class="form-control" name="hospital_image" >

                                                @if ($errors->has('hospital_image'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('hospital_image') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('hospital_name') ? ' has-error' : '' }} ">
                                            <label for="hospital_name" class="col-md-4 control-label">Hospital Name</label>

                                            <div class="col-md-6">
                                                <input id="hospital_name" type="text" class="form-control" name="hospital_name" value="{{ $hospital->hospital_name }}"  >

                                                @if ($errors->has('hospital_name'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('hospital_name') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('hospital_address') ? ' has-error' : '' }} ">
                                            <label for="hospital_address" class="col-md-4 control-label">Hospital Address</label>

                                            <div class="col-md-6">
                                                <input id="hospital_address" type="text" class="form-control" name="hospital_address" value="{{ $hospital->hospital_address }}" >

                                                @if ($errors->has('hospital_address'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('hospital_address') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('hospital_open_hours') ? ' has-error' : '' }} ">
                                            <label for="hospital_open_hours" class="col-md-4 control-label">Hospital Open Hours</label>

                                            <div class="col-md-6">
                                                <input id="hospital_open_hours" type="text" class="form-control" name="hospital_open_hours" value="{{ $hospital->hospital_open_hours }}" >

                                                @if ($errors->has('hospital_open_hours'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('hospital_open_hours') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('hospital_phone') ? ' has-error' : '' }} ">
                                            <label for="hospital_phone" class="col-md-4 control-label">Hospital Phone</label>

                                            <div class="col-md-6">
                                                <input id="hospital_phone" type="text" class="form-control" name="hospital_phone" value="{{ $hospital->hospital_phone }}" >

                                                @if ($errors->has('hospital_phone'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('hospital_phone') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('hospital_email') ? ' has-error' : '' }} ">
                                            <label for="hospital_email" class="col-md-4 control-label">Hospital Email</label>

                                            <div class="col-md-6">
                                                <input id="hospital_email" type="text" class="form-control" name="hospital_email" value="{{ $hospital->hospital_email }}" >

                                                @if ($errors->has('hospital_email'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('hospital_email') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('hospital_website') ? ' has-error' : '' }} ">
                                            <label for="hospital_website" class="col-md-4 control-label">Hospital Website</label>

                                            <div class="col-md-6">
                                                <input id="hospital_website" type="text" class="form-control" name="hospital_website" value="{{ $hospital->hospital_website }}" >

                                                @if ($errors->has('hospital_website'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('hospital_website') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <button id="submit" type="submit" class="btn btn-danger">
                                                    Update Hospital
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
//    $( "#enableEdit" ).click(function() {
//        //alert( "Handler for .click() called." );
//        $('#hospital_image').attr("disabled", false);
//        $('#hospital_name').attr("disabled", false);
//        $('#hospital_address').attr("disabled", false);
//        $('#hospital_open_hours').attr("disabled", false);
//        $('#hospital_phone').attr("disabled", false);
//        $('#submit').attr("disabled", false);
//    });
    function filePreview(input) {
        //$('#imageHolder + img').remove();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageHolder + img').remove();
                $('#imageHolder').after('<img src="'+e.target.result+'" width="150" height="200"/>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#product_picture").change(function () {
        //alert('aa');
        filePreview(this);
    });
</script>
@endsection