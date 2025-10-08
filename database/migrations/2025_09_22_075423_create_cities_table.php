<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 255);
			$table->bigInteger('governorate_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
}