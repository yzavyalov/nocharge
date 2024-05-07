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
        Schema::table('check_users', function (Blueprint $table) {
            $table->foreignId('owner_partner')->constrained('partners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('check_users', function (Blueprint $table) {
            $table->dropForeign(['owner_partner']);
            $table->dropColumn('owner_partner');
        });
    }
};
