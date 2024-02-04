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
        Schema::create('check_users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->string('agent')->nullable();
            $table->string('platform')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_users');
    }
};
