@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        <div class="text-center">Manage Specialist Types</div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div>Add new Type</div>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="POST" action="{{url('/addNewType')}}">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('specialist_name') ? ' has-error' : '' }} text-center">
                                                <label for="specialist_name" class="col-md-4 control-label">New Type</label>

                                                <div class="col-md-6">
                                                    <input id="specialist_name" type="text" class="form-control" name="specialist_name">

                                                    @if ($errors->has('specialist_name'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('specialist_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <button id="submit" type="submit" class="btn btn-danger">
                                                        Add Type
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <ul>
                                    <div class="row">
                                        @foreach($specialist_types as $specialist_type)
                                            <li>
                                                <div class="col-sm-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="text-center">{{$specialist_type->specialist_name}}
                                                                {{--<input type="text" value="{{$specialist_type->specialist_name}}" id="productType">--}}
                                                                <a href="{{url('/deleteSpecialistType/'.$specialist_type->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </div>
                                    <div class="row">

                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection