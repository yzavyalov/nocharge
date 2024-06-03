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
        Schema::table('ludomen', function (Blueprint $table) {
            $table->foreignId('check_user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ludomen', function (Blueprint $table) {
            $table->dropForeign(['check_user_id']);
            $table->dropColumn('check_user_id');
        });
    }
};
