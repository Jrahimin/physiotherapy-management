<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=['name','designation'];


    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
