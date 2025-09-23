<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('blood_types')->insert([
      ['name' => 'A+'],
      ['name' => 'A-'],
      ['name' => 'B+'],
      ['name' => 'B-'],
      ['name' => 'AB+'],
      ['name' => 'AB-'],
      ['name' => 'O+'],
      ['name' => 'O-'],
    ]);
  }
}
