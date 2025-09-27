<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    protected $fillable = array('name', 'governorate_id');
    public $timestamps = true;

    public function governorate()
    {
        return $this->belongsTo('Governorate');
    }

    public function clients()
    {
        return $this->hasMany('Client');
    }

    public function donationRecords()
    {
        return $this->hasMany('DonationRequests');
    }

}