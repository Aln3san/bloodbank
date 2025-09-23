<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('settings')->insert([
      [
        'phone' => '1234567890',
        'email' => 'bloodbank@gmail.com',
        'fb_url' => 'https://www.facebook.com/bloodbank',
        'x_url' => 'https://www.twitter.com/bloodbank',
        'insta_url' => 'https://www.instagram.com/bloodbank',
        'youtube_url' => 'https://www.youtube.com/bloodbank',
        'about_app' => 'This is a blood bank application.'
      ],
    ]);
  }
}
