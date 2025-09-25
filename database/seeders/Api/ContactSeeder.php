<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('contactus')->insert([
      [
        'subject' => 'you must improve your app',
        'message' => 'your app is very good but you must improve it more and more',
        'client_id' => 1,
        'created_at' => now(),
        'updated_at' => now()
      ]
    ]);
  }
}
