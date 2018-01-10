@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">

            <div class="panel panel-default container-fluid">
                <div class="panel-heading row">
                    <div class="col-sm-4">
                        Edit Mapped Insurance with Hospital
                    </div>
                    <div class="col-sm-8">
                        {{$hospital->name}}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Insurance Name</td>
                                <td>Insurance Email</td>
                                <td>Insurance Phone</td>
                                <td>Insurance Address</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insurances as $insurance)
                                <form class="form-horizontal" role="form" method="POST" action="{{url('/updateHospitalInsuranceMapping/'.$hospital->id.'/'.$insurance->transaction_id)}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td>
                                            <input type="text" name="doctor_list[]" value="{{$insurance->insurance_id}}" hidden><label>{{$insurance->insurance_name}}</label>
                                        </td>
                                        <td>{{$insurance->insurance_email}}</td>
                                        <td>{{$insurance->insurance_phone}}</td>
                                        <td>{{$insurance->insurance_address}}</td>

                                        <td><a href="{{url('/deleteHospitalInsuranceMapping/'.$insurance->transaction_id)}}" class="btn-danger btn">Delete Insurance Mapping</a></td>
                                        {{--<td><button class="btn-danger btn" type="submit">Update Mapped Insurance</button></td>--}}
                                    </tr>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="{{url('/mapHospitalInsuranceAvailable/'.$hospital->id)}}" class="btn-danger btn">Map Available Insurance</a>
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