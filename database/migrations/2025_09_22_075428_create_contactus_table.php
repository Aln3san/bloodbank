<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactusTable extends Migration {

	public function up()
	{
		Schema::create('contactus', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('subject', 255);
			$table->text('message');
			$table->bigInteger('client_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contactus');
	}
}