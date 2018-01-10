@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        <div class="col-sm-4"><h3>Update Insurance</h3></div>
                        {{--<div class="col-sm-8 text-right"><button class="btn-danger btn" id="enableEdit">Edit Insurance</button></div>--}}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form class="form-horizontal" role="form" method="POST" action="{{url('/updateInsurance/'.$insurance->id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group form-group-sm">
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('insurance_image') ? ' has-error' : '' }}">
                                            <label for="insurance_image" class="col-md-4 control-label">Insurance Picture</label>
                                            <div class="col-md-6">
                                                {{--<img src="{{URL::to('/images/'.$product->product_image)}}" class="product_image">--}}
                                                <div id="imageHolder"></div>
                                                <input id="insurance_image" type="file" class="form-control" name="insurance_image" >

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
                                                <input id="insurance_name" type="text" class="form-control" name="insurance_name" value="{{ $insurance->insurance_name }}"  >

                                                @if ($errors->has('insurance_name'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('insurance_name') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_address') ? ' has-error' : '' }} ">
                                            <label for="insurance_address" class="col-md-4 control-label">Insurance Address</label>

                                            <div class="col-md-6">
                                                <input id="insurance_address" type="text" class="form-control" name="insurance_address" value="{{ $insurance->insurance_address }}"  >

                                                @if ($errors->has('insurance_address'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('insurance_address') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_website') ? ' has-error' : '' }} ">
                                            <label for="insurance_website" class="col-md-4 control-label">Insurance Website</label>

                                            <div class="col-md-6">
                                                <input id="insurance_website" type="text" class="form-control" name="insurance_website" value="{{ $insurance->insurance_website }}"  >

                                                @if ($errors->has('insurance_website'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('insurance_website') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('insurance_phone') ? ' has-error' : '' }} ">
                                            <label for="insurance_phone" class="col-md-4 control-label">Insurance Phone</label>

                                            <div class="col-md-6">
                                                <input id="insurance_phone" type="text" class="form-control" name="insurance_phone" value="{{ $insurance->insurance_phone }}"  >

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
                                                <input id="insurance_email" type="text" class="form-control" name="insurance_email" value="{{ $insurance->insurance_email }}"  >

                                                @if ($errors->has('insurance_email'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('insurance_email') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="text-center">
                                                <button id="submit" type="submit" class="btn btn-danger" >
                                                    Update Insurance
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
//        $( "#enableEdit" ).click(function() {
//            //alert( "Handler for .click() called." );
//            $('#insurance_image').attr("disabled", false);
//            $('#insurance_name').attr("disabled", false);
//            $('#insurance_address').attr("disabled", false);
//            $('#insurance_email').attr("disabled", false);
//            $('#insurance_phone').attr("disabled", false);
//            $('#insurance_website').attr("disabled", false);
//            $('#submit').attr("disabled", false);
//        });
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