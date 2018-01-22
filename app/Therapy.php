<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapy extends Model
{
    protected $fillable=['name'];

    public function patients()
    {
        return $this->belongsToMany('App\Patient')->withPivot('date', 'amount');
    }

    public function prescriptions()
    {
        return $this->belongsToMany('App\Prescription')->withPivot('therapy_time', 'therapy_amount');
    }

}
