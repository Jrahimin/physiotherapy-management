<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable=['name', 'age','phone','doctor_id','date', 'consultancy_fee', 'image_path'];


    public function therapies()
    {
        return $this->belongsToMany('App\Therapy')->withPivot('id', 'date', 'amount', 'time', 'user_id', 'status');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
