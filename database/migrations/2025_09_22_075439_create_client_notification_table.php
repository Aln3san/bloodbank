<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientNotificationTable extends Migration {

	public function up()
	{
		Schema::create('client_notification', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('client_id')->unsigned();
			$table->bigInteger('notification_id')->unsigned();
			$table->boolean('is_read');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('client_notification');
	}
}