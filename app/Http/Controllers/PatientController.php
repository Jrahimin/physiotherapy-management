<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\Payment;
use App\Prescription;
use App\Therapy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    public function create()
    {
        //getting all the dotcors for drop down list
        $doctors=Doctor::all();
        return view('patient.create', compact('doctors'));
    }
    
    public function store(Request $request)
    {
        //validating data sent as request
        $this->validate($request,[
            'phone'=>'required|string|min:11|max:11',
            'doctor_id'=>'required|integer',
            'date'=>'required|date'
        ]);

        //getting the file & renaming
        $file = $request->file('image');
        $fileName = time().$file->getClientOriginalName();

        //moving file to publi/image folder with new name
        $file->move('image', $fileName);

        //adding new patinet to DB
        $patient = Patient::create($request->all());

        //setting new image path and save
        $patient->image_path = $fileName;
        $patient->save();

        //generating messages
        $request->session()->flash('status', 1);
        if(!empty($patient))
        {
            $request->session()->flash('status', 2);
        }

        //getting all the doctors
        $doctors=Doctor::all();
        return view('patient.create',compact('doctors'));
    }

    public function assignTherapy()
    {
        $users = User::all();
        $patients=Patient::orderBy('id','DESC')->get();
        $therapies=Therapy::all();

        return view('patient.assignTherapy',compact('users', 'patients','therapies'));
    }

    public function assignTherapyStore(Request $request)
    {
        //get prescription id
        $prescription = Prescription::where('patient_id', $request->patient_id)->orderBy('id', 'Desc')->first();
        $request['prescription_id'] = $prescription->id;

        //validating data
        $this->validate($request,[
            'amount'=>'required|numeric',
            'paid'=>'required|numeric',
            'patient_id'=>'required|integer',
            'therapy_id'=>'required|integer',
            'prescription_id'=>'required|integer',
        ]);
        
        $patient=Patient::find($request->patient_id);
        $date=$request->date;
        $amount=$request->amount;
        $time = $request->time;
        $user_id = $request->user_id;

        //attaching other attributes for the selected patient having the therapy_id from request
        $patient->therapies()->attach($request->therapy_id,array('time'=>$time, 'user_id'=>$user_id,
            'date'=>$date,'amount'=>$amount, 'status'=>0));

        //Inserting data to payment table
        $request['due_or_advance'] = $request->paid - $request->amount;
        $payment = Payment::create($request->all());

        $users = User::all();
        $patients=Patient::orderBy('id','DESC')->get();
        $therapies=Therapy::all();

        //generating messages
        $request->session()->flash('status', 1);
        if(!empty($patient))
        {
            $request->session()->flash('status', 2);
        }
        return view('patient.assignTherapy',compact('users', 'patients', 'therapies'));

    }
    
    public function assignTherapyStatus(Request $request)
    {
        DB::table('patient_therapy')->where('id', $request->therapy_patientId)->update(['status'=>1]);

        return redirect('search');
    }

}