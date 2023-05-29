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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->string('drone_id');
            $table->string('type_of_drone');
            $table->string('battery');
            $table->string('payload_capacity');
            $table->dateTime('date_time');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');
    }
};
