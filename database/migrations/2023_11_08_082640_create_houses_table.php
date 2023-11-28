<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * Дома
         */
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('number');
            $table->unsignedBigInteger('management_company_id');
            $table->timestamps();

            $table->foreign('management_company_id')->references('id')->on('management_companies');
        });

        Schema::table('management_companies', function (Blueprint $table) {
            $table->foreign('house_id')->references('id')->on('houses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
