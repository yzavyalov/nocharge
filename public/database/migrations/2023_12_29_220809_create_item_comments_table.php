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
        Schema::create('item_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bad_item_id')->constrained('bad_items');
            $table->foreignId('partner_id')->constrained('partners');
            $table->foreignId('user_id')->constrained('users');
            $table->text('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_comments');
    }
};
