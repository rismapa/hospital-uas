<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['id'];
    
    public function polyclinic()
    {
        return $this->belongsTo('App\Polyclinic', 'polyclinic_id', 'id');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor', 'doctor_id', 'id');
    }
}
