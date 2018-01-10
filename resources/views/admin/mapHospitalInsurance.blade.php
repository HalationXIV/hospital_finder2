@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <form class="form-horizontal" role="form" method="POST" action="{{url('/addHospitalInsuranceAvailableMapping/'.$hospital->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        Map Available Insurance with Hospital
                    </div>
                    @if(count($hospital_insuraces) > 0)
                    <div class="panel-body row">
                        <div class="row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Insurance Name</td>
                                    <td>Insurance Email</td>
                                    <td>Insurance Phone</td>
                                    <td>Insurance Address</td>
                                    {{--<td>Map</td>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hospital_insuraces as $hospital_insurace)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label class="col-sm-4"><input type="checkbox" value="{{$hospital_insurace->id}}" name="insurance_list[]" id="specialist_type">{{$hospital_insurace->insurance_name}}</label>
                                            </div>
                                        </td>
                                        <td>{{$hospital_insurace->insurance_email}}</td>
                                        <td>{{$hospital_insurace->insurance_phone}}</td>
                                        <td>{{$hospital_insurace->insurance_address}}</td>
                                        {{--<td><a href="{{url('/addHospitalDoctorMapping/'.$hospital->id.'/'.$doctor->id)}}" class="btn-danger btn">Map Doctor</a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <button type="submit" class="btn-danger btn">Map Insurances</button>
                            </div>
                            <div class="col-sm-10">
                                <a href="{{url('/editMappedInsurances/'.$hospital->id)}}" class="btn-danger btn">Edit Mapped Insurances</a>
                            </div>
                            {{--<div class="col-sm-10">--}}
                                {{--<a href="{{url('/editMappedDoctors/'.$insurance->id)}}" class="btn-danger btn">Edit Mapped Doctors</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    @else
                    <div class="panel-body row">
                        <h3>No insurance available</h3>
                        <div class="col-sm-10">
                            <a href="{{url('/editMappedInsurances/'.$hospital->id)}}" class="btn-danger btn">Edit Mapped Insurances</a>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection