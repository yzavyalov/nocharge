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
        Schema::create('review_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bad_item_id')->constrained('bad_items');
            $table->tinyInteger('grade')->nullable();
            $table->integer('sum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_statuses');
    }
};
