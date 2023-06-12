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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('gender');
            $table->string('department_id');
            $table->string('designation_id');
            $table->string('shift_id');
            $table->string('pay_slip_id');
            $table->string('location_id');
            $table->string('salary');
            $table->string('food_allowance');
            $table->string('other');
            $table->text('image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
