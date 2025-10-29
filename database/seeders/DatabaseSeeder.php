<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\User;
use Database\Seeders\Api\BloodTypeSeeder;
use Database\Seeders\Api\CategorySeeder;
use Database\Seeders\Api\CitySeeder;
use Database\Seeders\Api\ContactSeeder;
use Database\Seeders\Api\DonationRequestSeeder;
use Database\Seeders\Api\FavouritesSeeder;
use Database\Seeders\Api\GovernorateSeeder;
use Database\Seeders\Api\NotificationSeeder;
use Database\Seeders\Api\NotificationSettingsSeeder;
use Database\Seeders\Api\PostSeeder;
use Database\Seeders\Api\SettingSeeder;
use Database\Seeders\Dashboard\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      // BloodTypeSeeder::class,
      // GovernorateSeeder::class,
      // CitySeeder::class,
      // SettingSeeder::class,
      // CategorySeeder::class,
      // PostSeeder::class,
      // ContactSeeder::class,
      // NotificationSeeder::class,
      // DonationRequestSeeder::class,
      // FavouritesSeeder::class,
      // NotificationSettingsSeeder::class,
      UserSeeder::class,
    ]);
  }
}
