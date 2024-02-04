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
        Schema::table('bad_items', function (Blueprint $table) {
            $table->dropColumn('review');
            $table->text('text')->after('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bad_items', function (Blueprint $table) {
            $table->dropColumn('text');
            $table->text('review')->after('category');
        });
    }
};
