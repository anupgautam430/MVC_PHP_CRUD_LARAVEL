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
    Schema::create('activities', function (Blueprint $table) {
        $table->id('ActivityId');
       // $table->unsignedBigInteger('visitor_id');
        $table->unsignedBigInteger('officer_id');
        $table->dateTime('appointment_time');
        $table->date('Start_Date');
        $table->time('Start_Time');
        $table->date('End_Date');
        $table->time('End_Time');
        $table->enum('Status', ['Active', 'Cancelled'])->default('Active');
        $table->enum('Type', ['Leave', 'Break', 'Appointment']);
        $table->timestamps();

        // Foreign key constraints
        //$table->foreign('visitor_id')->references('id')->on('visitors');
        $table->foreign('officer_id')->references('id')->on('officers');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
