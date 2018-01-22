<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Patient;
use App\Prescription;
use App\Therapy;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    function create()
    {
        $patients = Patient::orderBy('id', 'Desc')->get();
        $therapies = Therapy::all();
        $diseases = Disease::where('parent_id', 0)->get();

        return view('prescription.create', compact('patients', 'therapies', 'diseases'));
    }

    function store(Request $request)
    {
        $therapies = $request->therapyArray;
        $therapy = implode(', ', $therapies);
        $request['therapy'] = $therapy;
        $prescription = Prescription::create($request->all());
        
        $therapy = $prescription->therapy;
        $therapyIds = explode(",", $therapy);
        $therapies = collect([]);
        foreach ($therapyIds as $oneTherapyId)
        {
            $oneTherapy = Therapy::find($oneTherapyId);
            $therapies->push($oneTherapy);
        }

        $diseaseName = Disease::find($request->main_disease);
        $diseaseName = $diseaseName->name;
        $patient = $prescription->patient;

        return view('prescription/show', compact('prescription', 'therapies', 'patient','diseaseName'));
    }
}
