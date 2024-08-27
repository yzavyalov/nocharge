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
        Schema::create('connect_rewiews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_bad_item_id')->constrained('bad_items','id');
            $table->foreignId('secondary_bad_item_id')->constrained('bad_items','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connect_rewiews');
    }
};
