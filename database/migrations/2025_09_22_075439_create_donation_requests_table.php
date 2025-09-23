<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('patient_name', 255);
			$table->integer('patient_age');
			$table->bigInteger('blood_type_id')->unsigned();
			$table->integer('bags_number');
			$table->string('hospital_name', 255);
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->bigInteger('city_id')->unsigned();
			$table->bigInteger('client_id')->unsigned();
			$table->string('patient_phone');
			$table->text('notes');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}