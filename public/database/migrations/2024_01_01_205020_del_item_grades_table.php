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
        Schema::dropIfExists('item_grades');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('item_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bad_item_id')->constrained('bad_items');
            $table->foreignId('partner_id')->constrained('partners');
            $table->integer('grade');
            $table->timestamps();
        });
    }
};
