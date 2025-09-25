<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationRequestSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('donation_requests')->insert([
      [
        'patient_name' => 'John Doe',
        'patient_age' => 30,
        'blood_type_id' => 1,
        'bags_number' => 2,
        'hospital_name' => 'City Hospital',
        'latitude' => '30.56566566456',
        'longitude' => '31.56566566456',
        'city_id' => 1,
        'patient_phone' => '1234567890',
        'notes' => 'Urgent need for blood',
        'client_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'patient_name' => 'Jane Smith',
        'patient_age' => 25,
        'blood_type_id' => 2,
        'bags_number' => 3,
        'hospital_name' => 'General Hospital',
        'latitude' => '30.56566566456',
        'longitude' => '31.56566566456',
        'city_id' => 2,
        'patient_phone' => '0987654321',
        'notes' => '',
        'client_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'patient_name' => 'Alice Johnson',
        'patient_age' => 40,
        'blood_type_id' => 3,
        'bags_number' => 1,
        'hospital_name' => 'County Hospital',
        'latitude' => '30.56566566456',
        'longitude' => '31.56566566456',
        'city_id' => 3,
        'patient_phone' => '1122334455',
        'notes' => 'Patient is in critical condition',
        'client_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
