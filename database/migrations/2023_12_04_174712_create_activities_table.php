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
            $table->id();
            $table->unsignedBigInteger('officer_id');
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->string('name');
            $table->enum('type', ['Leave', 'Appointment', 'Break']);
            $table->enum('status', ['Active', 'Cancelled', 'Deactivated', 'Completed']);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->timestamp('added_on')->useCurrent();
            $table->timestamp('last_updated_on')->nullable();
            
            // Foreign keys
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('set null');
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
