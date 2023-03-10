<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = ['id'];

    public function polyclinic()
    {
        return $this->belongsTo('App\Polyclinic', 'polyclinic_id', 'id');
    }
    public function patient()
    {
        return $this->hasMany('App\Patient', 'polyclinic_id', 'id');
    }
}
