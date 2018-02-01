<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['patient_id', 'main_disease_id', 'sub_disease_id', 'history', 'date'];
    
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function main_disease()
    {
        return $this->belongsTo('App\Disease');
    }

    public function sub_disease()
    {
        return $this->belongsTo('App\Disease');
    }

    public function therapies()
    {
        return $this->belongsToMany('App\Therapy')->withPivot('therapy_time', 'therapy_amount');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
