@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">

                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        Edit Mapped Doctor with Hospital
                    </div>
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
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <form class="form-horizontal" role="form" method="POST" action="{{url('/updateHospitalDoctorMapping/'.$hospital->id.'/'.$doctor->transaction_id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <tr>
                                        <td>
                                            <input type="text" name="doctor_list[]" value="{{$doctor->id}}" hidden><label>{{$doctor->doctor_name}}</label>
                                        </td>
                                        <td>{{$doctor->specialist_name}}</td>
                                        <td>{{$doctor->doctor_email}}</td>
                                        <td>{{$doctor->doctor_phone}}</td>

                                        <td><input type="text" name="practice_hours[]" id="practice_hours" value="{{$doctor->practice_hours}}"></td>
                                        <td><a href="{{url('/deleteHospitalDoctorMapping/'.$doctor->transaction_id)}}" class="btn-danger btn">Delete Doctor Mapping</a></td>
                                        <td><button class="btn-danger btn" type="submit">Update Mapped Doctor</button></td>
                                    </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="{{url('/mapHospitalDoctorAvailable/'.$hospital->id)}}" class="btn-danger btn">Map Available Doctor</a>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $('#doctor_list').change(function () {
           if($('#doctor_list').is(':checked')){
               console.log($('#practice_hours').val());
           }
        });
        $('#submit').click(function () {
            $.each($("input[name='']:checked"), function(){
                alert($(this).val());
                //favorite.push($(this).val());
            });
        });
    </script>
@endsection