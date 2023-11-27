<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * Категории пользователей
         */
        Schema::create('category_users', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['super_admin', 'admin', 'management_company', 'tenant'])->default('guest');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_users');
    }
};
