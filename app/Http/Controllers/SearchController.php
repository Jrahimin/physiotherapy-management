<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Doctor;
use App\Patient;
use App\Payment;
use App\Prescription;
use App\Therapy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        //getting all the doctors and patients
        $doctors = Doctor::all();
        $patients = Patient::all();
        
        return view('search.search',compact('doctors', 'patients'));
    }
    
    public function search_result(Request $request)
    {
        $pic = 1;
        $verify = 1;
        
        $patients = Patient::all();

        $allPatientTherapy = collect([]);

        if($request->search_type==="1")
        {
            $date = 0;
            if(!empty($request->therapyDate))
            {
                $date =1;
                $verify = 2;
                foreach ($patients as $patient)
                {
                    foreach ($patient->therapies as $therapy)
                    {
                        if($therapy->pivot->date===$request->therapyDate)
                        {
                            $userId = $therapy->pivot->user_id;
                            $user = User::find($userId);
                            if(!empty($user))
                            {
                                $userName = $user->name;
                            }
                            else
                            {
                                $userName = "নাই";
                            }
                            $allPatientTherapy->push(['therapy_patientId'=>$therapy->pivot->id, 'patientName'=>$patient->name, 'date'=>$therapy->pivot->date, 'therapyName'=>$therapy->name, 'patientId'=>$patient->id,'amount'=>$therapy->pivot->amount, 'time'=>$therapy->pivot->time, 'userName'=>$userName, 'status'=>$therapy->pivot->status]);
                        }
                    }
                }
            }
            else
            {
                foreach ($patients as $patient)
                {
                    foreach ($patient->therapies as $therapy)
                    {
                        $userId = $therapy->pivot->user_id;
                        $user = User::find($userId);
                        if(!empty($user))
                        {
                            $userName = $user->name;
                        }
                        else
                        {
                            $userName = "নাই";
                        }
                        $allPatientTherapy->push(['therapy_patientId'=>$therapy->pivot->id, 'patientName'=>$patient->name, 'date'=>$therapy->pivot->date, 'therapyName'=>$therapy->name, 'patientId'=>$patient->id,'amount'=>$therapy->pivot->amount,'time'=>$therapy->pivot->time, 'userName'=>$userName, 'status'=>$therapy->pivot->status]);
                    }
                }
            }

        }

        if($request->search_type==="2")
        {
            $pic = 2;
            $patient = Patient::find($request->patientId);

            $due_or_advance = 0;
            foreach ($patient->payments as $payment)
            {
                $due_or_advance = $due_or_advance + $payment->due_or_advance;
            }

            return view('search.resultOfIdSearch',compact('patient','pic', 'due_or_advance'));

        }


        if($request->search_type==="3")
        {
            $doctor=Doctor::find($request->doctor_id);
            $patients = $doctor->patients;
            
            return view('search.searchByDoctor', compact('doctor', 'patients'));
        }

        if($request->search_type==="4")
        {
            if(!empty($request->date))
            {
                $patients=Patient::where('date',$request->date)->get();
                $numberOfPatients=count($patients);
                $date=1;
            }
            else
            {
                $patients=Patient::orderBy('date', 'DESC')->get();
                $numberOfPatients=count($patients);
                $date=0;
            }

            return view('search.dateResult',compact('patients','numberOfPatients','date', 'doctor'));
        }

        if($request->search_type==="5")
        {
            $patient=Patient::find($request->patient);

            $prescription=Prescription::find($request->prescription_id);

            $therapies = $prescription->therapies;

            $diseaseName = Disease::find($prescription->main_disease);
            $diseaseName = $diseaseName->name;

            return view('prescription.show',compact('prescription', 'therapies', 'patient','diseaseName'));
        }

        if($request->search_type==="6")
        {
            $patients=Patient::where('phone',$request->phone)->get();

            return view('search.phoneSearchResult',compact('patients'));
        }

        if($request->search_type==="7")
        {
            $patients=Patient::where('consultancy_fee',$request->consultancyFee)->orderBy('date','DESC')->get();

            return view('search.consultancyFeeResult',compact('patients'));
        }

        return view('search.result', compact('allPatientTherapy', 'pic', 'date', 'verify'));
    }



    public function searchById($id)
    {
        $pic = 2;
        $patient = Patient::find($id);

        $due_or_advance = 0;
        foreach ($patient->payments as $payment)
        {
            $due_or_advance = $due_or_advance + $payment->due_or_advance;
        }

        return view('search.resultOfIdSearch', compact('patient', 'pic', 'due_or_advance'));
    }
}


