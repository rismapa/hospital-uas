<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    protected $guarded = ['id'];

    public function doctor()
    {
        return $this->hasMany('App\Doctor', 'polyclinic_id', 'id');
    }
    public function patient()
    {
        return $this->hasMany('App\Patient', 'polyclinic_id', 'id');
    }
}
