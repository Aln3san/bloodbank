<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title', 255);
			$table->text('message');
			$table->bigInteger('donation_request_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}