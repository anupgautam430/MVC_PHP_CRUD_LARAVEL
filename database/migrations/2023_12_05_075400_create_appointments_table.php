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
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('visitor_id');
        $table->unsignedBigInteger('officer_id');
        $table->dateTime('appointment_time');
        $table->string('status')->default('active');
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('visitor_id')->references('id')->on('visitors');
        $table->foreign('officer_id')->references('id')->on('officers');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
