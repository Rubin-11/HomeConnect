<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * Заявки
         */
        Schema::create('applications_from_users', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->enum('status', ['в работе', 'продлено', 'выполнена', 'отменена'])->default('ожидает рассмотрения');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications_from_users');
    }
};
