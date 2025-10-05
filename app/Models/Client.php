<?php

namespace App\Models;

use Faker\Core\Blood;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
  use HasApiTokens;

  protected $table = 'clients';
  public $timestamps = true;
  protected $fillable = array('name', 'phone', 'password', 'email', 'date_of_birth', 'blood_type_id', 'last_donation_date', 'city_id');

  public function bloodType()
  {
    return $this->belongsTo(Client::class);
  }

  public function city()
  {
    return $this->belongsTo(City::class);
  }

  public function posts()
  {
    return $this->belongsToMany(Post::class);
  }

  public function contactMessages()
  {
    return $this->hasMany(Contact::class);
  }

  public function notifications()
  {
    return $this->belongsToMany(Notification::class);
  }

  public function donationRequests()
  {
    return $this->hasMany(DonationRequest::class);
  }

  public function governorates()
  {
    return $this->belongsToMany(Governorate::class);
  }

  public function bloodTypes()
  {
    return $this->belongsToMany(BloodType::class);
  }
}
