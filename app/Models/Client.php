<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'password', 'email', 'date_of_birth', 'blood_type_id', 'last_donation_date', 'city_id');

    public function bloodType()
    {
        return $this->belongsTo('Client');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    public function contactMessages()
    {
        return $this->hasMany('Contact');
    }

    public function notifications()
    {
        return $this->belongsToMany('Notification');
    }

    public function donationRequestss()
    {
        return $this->hasMany('DonationRequests');
    }

    public function governorates()
    {
        return $this->belongsToMany('Governorate');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('BloodType');
    }

}