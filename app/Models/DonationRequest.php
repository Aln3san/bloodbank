<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_age', 'blood_type_id', 'bags_number', 'hospital_name', 'latitude', 'longitude', 'city_id', 'patient_phone', 'notes');

    public function bloodType()
    {
        return $this->belongsTo('BloodType');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function client()
    {
        return $this->belongsTo('Client');
    }

}