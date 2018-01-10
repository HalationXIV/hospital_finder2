<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function (){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('register', 'Auth\AuthController@showRegistrationForm');

    Route::post('/register', function(){
       return view('welcome');
    });

    Route::auth();
    Route::get('/home', function (){
        return view('welcome');
    });

    Route::get('/aboutUs', function (){
        return view('aboutUs');
    });

    //search
    Route::get('/search', 'SearchController@index');
    Route::post('/searchHospital', 'SearchController@search');
    Route::get('/hospital_detail/{id}', 'SearchController@hospital_detail');


    //manage hospital
    Route::get('/manageHospital', 'HospitalController@index');
    Route::post('/addHospital', 'HospitalController@addHospital');
    Route::get('/updateHospitalPage/{id}', 'HospitalController@updateHospitalPage');
    Route::post('/updateHospital/{id}', 'HospitalController@updateHospital');
    Route::get('/deleteHospital/{id}', 'HospitalController@deleteHospital');

    //manage specialist type
    Route::get('/manageSpecialistType','SpecialistTypeController@index');
    Route::post('/addNewType','SpecialistTypeController@addNewType');
    Route::get('/deleteSpecialistType/{id}', 'SpecialistTypeController@deleteSpecialistType');

    //manage doctors
    Route::get('/manageDoctors', 'DoctorController@index');
    Route::post('/addDoctor', 'DoctorController@addDoctor');
    Route::get('/updateDoctorPage/{id}', 'DoctorController@updateDoctorPage');
    Route::post('/updateDoctor/{id}', 'DoctorController@updateDoctor');
    Route::get('/deleteDoctor/{id}','DoctorController@deleteDoctor');

    //manage insurance
    Route::get('/manageInsurance', 'InsuranceController@index');
    Route::post('/addInsurance', 'InsuranceController@addInsurance');
    Route::get('/updateInsurancePage/{id}', 'InsuranceController@updateInsurancePage');
    Route::post('/updateInsurance/{id}', 'InsuranceController@updateInsurance');
    Route::get('/deleteInsurance/{id}','InsuranceController@deleteInsurance');

    //map available insurance with hospital
    Route::get('/mapHospitalInsuranceAvailable/{id}', 'MappingController@mapHospitalInsuranceAvailable');
    Route::post('/addHospitalInsuranceAvailableMapping/{idHospital}', 'MappingController@addHospitalInsuranceAvailableMapping');

    //go to update page mapping insurances
    Route::get('/editMappedInsurances/{id}', 'MappingController@editMappedInsurances');
    Route::get('/deleteHospitalInsuranceMapping/{id}', 'MappingController@deleteHospitalInsuranceMapping');

    //map avaiblable doctor with hospital
    Route::get('/mapHospitalDoctorAvailable/{id}', 'MappingController@mapHospitalDoctorAvailable');
    Route::post('/addHospitalDoctorAvailableMapping/{idHospital}', 'MappingController@addHospitalDoctorAvailableMapping');

    //go to update page
    Route::get('/editMappedDoctors/{id}', 'MappingController@editMappedDoctors');
    Route::get('/deleteHospitalDoctorMapping/{idTransaction}', 'MappingController@deleteHospitalDoctorMapping');

    //update mapping hospital doctor
    Route::post('/updateHospitalDoctorMapping/{idHospital}/{idTransaction}', 'MappingController@updateHospitalDoctorMapping');

});

Route::get('/', function () {
    return view('welcome');
});



