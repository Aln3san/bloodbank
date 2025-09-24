<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Api\BloodTypeSeeder;
use Database\Seeders\Api\CategorySeeder;
use Database\Seeders\Api\CitySeeder;
use Database\Seeders\Api\GovernorateSeeder;
use Database\Seeders\Api\PostSeeder;
use Database\Seeders\Api\SettingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    $this->call([
      BloodTypeSeeder::class,
      GovernorateSeeder::class,
      CitySeeder::class,
      SettingSeeder::class,
      CategorySeeder::class,
      PostSeeder::class,
    ]);
  }
}
