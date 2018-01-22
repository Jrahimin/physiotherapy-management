<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function store(Request $request)
    {
        if($request->diseaseType==1)
        {
            $disease = new Disease();

            $disease->name = $request->nameMain;
            $disease->parent_id = 0;
            $disease->save();
        }

        if($request->diseaseType==2)
        {
            $disease = new Disease();

            $disease->name = $request->nameSub;
            $disease->parent_id = $request->parent_id;
            $disease->save();
        }

        return redirect('therapy/create');
    }
}
