<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->index('phone');
            $table->index('city_id');
            $table->index('blood_type_id');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropIndex(['phone']);
            $table->dropIndex(['city_id']);
            $table->dropIndex(['blood_type_id']);
        });
    }
}
