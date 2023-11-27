<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * Квартиры
         */
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('house_id');
            $table->unsignedBigInteger('meters_readings_id');
            $table->timestamps();

            $table->foreign('meters_readings_id')->references('id')->on('meters_readings');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
