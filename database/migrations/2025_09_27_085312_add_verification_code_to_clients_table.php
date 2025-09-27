<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('clients', function (Blueprint $table) {
      $table->string('verification_code', 6)->nullable()->after('phone');
      $table->timestamp('verification_code_expires_at')->nullable()->after('verification_code');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('clients', function (Blueprint $table) {
      $table->dropColumn('verification_code');
      $table->dropColumn('verification_code_expires_at');
    });
  }
};
