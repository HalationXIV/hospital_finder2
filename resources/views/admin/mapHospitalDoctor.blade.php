@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <form class="form-horizontal" role="form" method="POST" action="{{url('/addHospitalDoctorAvailableMapping/'.$hospital->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        Map Available Doctor with Hospital
                    </div>
                    @if(count($doctors) > 0)
                    <div class="panel-body row">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Doctor Name</td>
                                        <td>Specialist</td>
                                        <td>Doctor Email</td>
                                        <td>Doctor Phone</td>
                                        <td>Practice hours</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($doctors as $doctor)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label class="col-sm-4"><input type="checkbox" value="{{$doctor->id}}" name="doctor_list[]" id="specialist_type">{{$doctor->doctor_name}}</label>
                                            </div>
                                        </td>
                                        <td>{{$doctor->specialist_name}}</td>
                                        <td>{{$doctor->doctor_email}}</td>
                                        <td>{{$doctor->doctor_phone}}</td>

                                            <td><input type="text" name="practice_hours[]" id="practice_hours" placeholder="08.00-12.00"></td>
                                        {{--<td><a href="{{url('/addHospitalDoctorMapping/'.$hospital->id.'/'.$doctor->id)}}" class="btn-danger btn">Map Doctor</a></td>--}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <button type="submit" class="btn-danger btn">Map Doctors</button>
                            </div>
                            <div class="col-sm-10">
                                <a href="{{url('/editMappedDoctors/'.$hospital->id)}}" class="btn-danger btn">Edit Mapped Doctors</a>
                            </div>

                        </div>
                    </div>
                    @else
                    <div class="panel-body row">
                        <h3>No available doctor</h3>
                        <div class="col-sm-10">
                            <a href="{{url('/editMappedDoctors/'.$hospital->id)}}" class="btn-danger btn">Edit Mapped Doctors</a>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection