<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * Показания приборов учета.
         */
        Schema::create('meters_readings', function (Blueprint $table) {
            $table->id();
            $table->string('water');
            $table->string('gas');
            $table->string('heating');
            $table->string('electricity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meters_readings');
    }
};
