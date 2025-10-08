<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPostTable extends Migration
{

  public function up()
  {
    Schema::create('client_post', function (Blueprint $table) {
    // Columns
    $table->bigIncrements('id');
    $table->unsignedBigInteger('client_id');
    $table->unsignedBigInteger('post_id');

    // Foreign key constraints
    $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

    $table->timestamps();
});

  }

  public function down()
  {
    Schema::drop('client_post');
  }
}
