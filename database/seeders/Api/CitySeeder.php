<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('cities')->insert([
      ['name' => 'Cairo', 'governorate_id' => 1],
      ['name' => 'Giza', 'governorate_id' => 1],
      ['name' => 'Alexandria', 'governorate_id' => 2],
      ['name' => 'Mansoura', 'governorate_id' => 3],
      ['name' => 'Tanta', 'governorate_id' => 4],
      ['name' => 'Aswan', 'governorate_id' => 5],
      ['name' => 'Luxor', 'governorate_id' => 6],
      ['name' => 'Suez', 'governorate_id' => 7],
      ['name' => 'Ismailia', 'governorate_id' => 8],
      ['name' => 'Port Said', 'governorate_id' => 9],
    ]);
  }
}
