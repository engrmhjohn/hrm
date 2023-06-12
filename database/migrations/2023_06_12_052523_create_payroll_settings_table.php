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
        Schema::create('payroll_settings', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_type');
            $table->string('employee_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('late_in_cut');
            $table->string('early_out_cut');
            $table->string('unpaid_leave_cut');
            $table->string('absent_cut');
            $table->string('bonus');
            $table->string('bonus_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_settings');
    }
};
