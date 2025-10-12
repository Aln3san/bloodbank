<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

  protected $table = 'notifications';
  public $timestamps = true;
  protected $fillable = array(
    'title',
    'message',
    'donation_request_id',
    'client_id',
  );

  public function clients()
  {
    return $this->belongsTo(Client::class);
  }

  public function notifiable()
  {
    return $this->morphTo();
  }
}
