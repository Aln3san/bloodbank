<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSettingsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('blood_type_client')->insert([
      ['blood_type_id' => 1, 'client_id' => 1],
      ['blood_type_id' => 2, 'client_id' => 1],
      ['blood_type_id' => 3, 'client_id' => 1],
    ]);
  }
}
