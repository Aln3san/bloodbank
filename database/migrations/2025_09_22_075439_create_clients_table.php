<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

  public function up()
  {
    Schema::create('clients', function (Blueprint $table) {
      $table->bigIncrements('id', true);
      $table->string('name', 255);
      $table->bigInteger('phone')->unique();
      $table->string('password', 255);
      $table->string('email', 255);
      $table->date('date_of_birth');
      $table->bigInteger('blood_type_id')->unsigned();
      $table->date('last_donation_date');
      $table->bigInteger('city_id')->unsigned();
      $table->timestamps();

      $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade');
      $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
    });
  }

  public function down()
  {
    Schema::drop('clients');
  }
}
