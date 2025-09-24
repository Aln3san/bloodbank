<?php

namespace Database\Seeders\Api;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('posts')->insert([
      [
        'title' => 'Post 1',
        'content' => 'Content of Post 1',
        'photo' => 'post1.jpg',
        'category_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'Post 2',
        'content' => 'Content of Post 2',
        'photo' => 'post2.jpg',
        'category_id' => 2,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'title' => 'Post 3',
        'content' => 'Content of Post 3',
        'photo' => 'post3.jpg',
        'category_id' => 3,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
