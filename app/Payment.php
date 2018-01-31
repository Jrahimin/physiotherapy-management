<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount','paid','due_or_advance','patient_id','prescription_id'];
    
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function prescription()
    {
        return $this->belongsTo('App\Prescription');
    }
}
