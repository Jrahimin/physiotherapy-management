<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Therapy;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();




Route::group(['middleware'=>'auth'],function () {

    Route::get('patient/create', 'PatientController@create')->name('patient.create');
    Route::post('patient/store', 'PatientController@store')->name('patient.store');
    Route::get('/patient/assignTherapy','PatientController@assignTherapy')->name('patient.assign');
    Route::post('/patient/assignTherapyStore','PatientController@assignTherapyStore')->name('patient.assignStore');
    Route::post('/patient/therapyStatus','PatientController@assignTherapyStatus')->name('patient.therapyStatus');
    
    Route::resource('/therapy','TherapyController');

    Route::get('search', 'SearchController@index')->name('search');
    Route::get('/searchById/{id}','SearchController@searchById')->name('search.id');
    Route::post('search/result', 'SearchController@search_result')->name('search.result');

    Route::get('/doctor/create','DoctorController@create')->name('doctor.create');
    Route::post('/doctor/store','DoctorController@store')->name('doctor.store');

    Route::post('/disease/store', 'DiseaseController@store')->name('disease.store');


    Route::get('/user/search','UserController@search')->name('user.search');
    Route::post('/user/searchResult','UserController@searchResult')->name('user.result');
    Route::get('/user/delete/{user}','UserController@delete')->name('user.delete');
    Route::get('/user/edit/{user}','UserController@edit')->name('user.edit');
    Route::post('/user/update','UserController@update')->name('user.update');
    Route::get('/user/change/{user}','UserController@change')->name('user.change');

    Route::get('prescription/create','PrescriptionController@create')->name('prescription.create');
    Route::post('prescription/store','PrescriptionController@store')->name('prescription.store');
    
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax-subDisease',function (Request $request){

    $parent_id=$request::input(['parent_id']);
    $subDiseases = \App\Disease::where('parent_id', $parent_id)->get();
    return Response::json($subDiseases);
});

Route::get('ajax-therapies',function (Request $request){

    $patient_id=$request::input(['patient_id']);
    $patient_therapies = DB::table('patient_therapy')->where('patient_id', $patient_id)->get();
    
    $therapies = collect([]);

    foreach ($patient_therapies as $patient_therapy)
    {
        $therapy = \App\Therapy::find($patient_therapy->therapy_id);
        $therapies->push($therapy);
    }

    return Response::json($therapies);
});

Route::get('ajax-prescription',function (Request $request){

    $patient_id=$request::input(['patient_id']);
    $prescriptions = \App\Prescription::where('patient_id', $patient_id)->get();
    return Response::json($prescriptions);
});
Route::get('ajax-prescription-therapy',function (Request $request){
    $patient_id=$request::input(['patient_id']);
    $prescription = \App\Prescription::where('patient_id', $patient_id)->orderBy('id','DESC')->first();
    $therapies = $prescription->therapies;

    $payments = $prescription->payments;
    $payment = $prescription->payments->last();
    $totalDueOAdvance = 0;
    $lastAmount = 0;

    if($payment)
    {
        $lastAmount = $payment->amount;
        foreach ($payments as $onePayment)
        {
            $totalDueOAdvance = $totalDueOAdvance + $onePayment->due_or_advance;
        }
    }

    return Response::json(["therapies"=>$therapies, "lastAmount"=>$lastAmount, "totalDueOAdvance"=>$totalDueOAdvance]);
});

Route::get('ajax-therapies', function(Request $request){
   $therapies = Therapy::all();
    return Response::json($therapies);
});

Route::get('ajax-therapy-amount', function(Request $request){
    $patient_id = $request::input(['patient_id']);
    $therapy_id = $request::input(['therapy_id']);
    $patient_therapy = DB::table('patient_therapy')->where('patient_id', $patient_id)->where('therapy_id', $therapy_id)
        ->orderBy('id', 'Desc')->first();
    if($patient_therapy!=null)
        $amount = $patient_therapy->amount;
    else
        $amount = 0;
    
    return Response::json($amount);
});
