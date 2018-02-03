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
        $i = 0;
        $prescription = Prescription::create($request->all());

        foreach ($request->therapy_ids as $therapy_id)
        {
            $prescription->therapies()->attach($therapy_id, array("therapy_time"=>$request->therapy_times[$i],
                "therapy_amount"=>$request->therapy_amounts[$i]));

            $i++;
        }

        $therapies = $prescription->therapies;

        $diseaseName = Disease::find($request->main_disease_id);
        $diseaseName = $diseaseName->name;
        $patient = $prescription->patient;

        return view('prescription/show', compact('prescription', 'therapies', 'patient','diseaseName'));
    }
}
