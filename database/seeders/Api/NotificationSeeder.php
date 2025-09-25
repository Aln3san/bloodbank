<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('notifications')->insert([
      [
        'title' => 'New Donation Request',
        'message' => 'A new donation request has been created. Please check the app for more details.',
        'donation_request_id' => 7,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'Donation Request Approved',
        'message' => 'Your donation request has been approved. Thank you for your contribution!',
        'donation_request_id' => 8,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'Donation Request Completed',
        'message' => 'Your donation request has been completed successfully.',
        'donation_request_id' => 9,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
