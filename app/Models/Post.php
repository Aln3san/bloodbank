<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;



class Post extends Model
{

  protected $table = 'posts';
  public $timestamps = true;
  protected $fillable = array('title', 'content', 'photo', 'category_id');

  public function getPhotoUrlAttribute()
  {
    $disk = Storage::disk('public');

    // 1) إذا الحقل موجود ومساره صالح
    if ($this->photo && $disk->exists($this->photo)) {
      return Storage::url($this->photo);
    }

    // 2) حاول مع بادئة posts/
    if ($this->photo && $disk->exists('posts/' . $this->photo)) {
      return Storage::url('posts/' . $this->photo);
    }

    // 3) حاول إيجاد ملف باسمه يبدأ بالـ id داخل storage (posts/ أو root)
    $base = storage_path('app/public');
    $candidates = [
      $base . '/posts/' . $this->id . '.*',
      $base . '/' . $this->id . '.*',
    ];

    foreach ($candidates as $pattern) {
      $matches = glob($pattern);
      if (!empty($matches)) {
        // خذ أول تطابق وارجع المسار النسبي بالنسبة لـ storage
        $relative = str_replace($base . '/', '', $matches[0]);
        return asset('storage/' . $relative);
      }
    }

    // 4) افتراضي
    return asset('website/imgs/p1.jpg');
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function clients()
  {
    return $this->belongsToMany(Client::class);
  }
}
