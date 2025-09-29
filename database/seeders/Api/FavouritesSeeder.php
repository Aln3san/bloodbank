<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouritesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('client_post')->insert([
      [
        'client_id' => 1,
        'post_id' => 1,
      ],
      [
        'client_id' => 1,
        'post_id' => 2,
      ],
      [
        'client_id' => 1,
        'post_id' => 3,
      ],
      [
        'client_id' => 1,
        'post_id' => 4,
      ],
    ]);
  }
}
