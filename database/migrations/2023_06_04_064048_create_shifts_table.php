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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('saturday_in_time')->nullable();
            $table->string('saturday_out_time')->nullable();
            $table->string('sunday_in_time')->nullable();
            $table->string('sunday_out_time')->nullable();
            $table->string('monday_in_time')->nullable();
            $table->string('monday_out_time')->nullable();
            $table->string('tuesday_in_time')->nullable();
            $table->string('tuesday_out_time')->nullable();
            $table->string('wednesday_in_time')->nullable();
            $table->string('wednesday_out_time')->nullable();
            $table->string('thursday_in_time')->nullable();
            $table->string('thursday_out_time')->nullable();
            $table->string('friday_in_time')->nullable();
            $table->string('friday_out_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
