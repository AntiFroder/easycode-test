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
        Schema::create('confirm_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('setting_id')->constrained();
            $table->string('value')->comment('Значение на которое будет изменена настройка');
            $table->string('type')->comment('Какой тип сервиса был использован для отправки кода');
            $table->integer('confirm_code');
            $table->boolean('is_confirm')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirm_settings');
    }
};
