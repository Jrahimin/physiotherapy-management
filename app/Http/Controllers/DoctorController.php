<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function create()
    {
        return view('doctor.create');
    }

    public function store(Request $request)
    {
        //inserting a new doctor info
        $doctor=Doctor::create($request->all());

        //generating message
        $request->session()->flash('status', 1);
        if(!empty($doctor))
        {
                $request->session()->flash('status', 2);
        }

        return view('doctor.create');
    }
}
