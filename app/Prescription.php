<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['patient_id', 'main_disease', 'sub_disease', 'history', 'therapy', 'therapy_details', 'date'];
    
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function therapies()
    {
        return $this->belongsToMany('App\Therapy')->withPivot('therapy_time', 'therapy_amount');
    }
}
