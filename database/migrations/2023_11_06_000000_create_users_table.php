<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /**
         * Пользователи
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firs_name');
            $table->string('last_name');
            $table->string('patronymic');
            $table->json('phone_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_confirmation');
            $table->unsignedBigInteger('category_users_id');
            $table->unsignedBigInteger('flat_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('category_users_id')->references('id')->on('category_users');
            $table->foreign('flat_id')->references('id')->on('flats');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
