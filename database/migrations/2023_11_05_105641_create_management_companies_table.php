<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /**
         * Управляющие компании
         */
        Schema::create('management_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('phone_number');
            $table->unsignedBigInteger('house_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('management_companies');
    }
};
