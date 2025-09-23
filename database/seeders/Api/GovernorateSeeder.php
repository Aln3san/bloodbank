<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('governorates')->insert([
      ['name' => 'DAKAHLIYA'],
      ['name' => 'CAIRO'],
      ['name' => 'ALEXANDRIA'],
      ['name' => 'GIZA'],
      ['name' => 'SUEZ'],
      ['name' => 'PORT SAID'],
      ['name' => 'DAMANHOUR'],
    ]);
  }
}
