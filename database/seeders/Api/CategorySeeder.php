<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('categories')->insert([
      [
        'name' => 'Category 1',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Category 2',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Category 3',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
