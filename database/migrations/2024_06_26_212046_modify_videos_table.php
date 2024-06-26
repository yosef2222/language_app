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
        Schema::table('videos', function (Blueprint $table) {
            // Drop the existing published_at column
            $table->dropColumn('published_at');

            // Add new columns category and level
            $table->string('category')->nullable()->after('duration');
            $table->string('level')->nullable()->after('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            // Reverse the changes made in the 'up' method
            $table->timestamp('published_at')->nullable()->after('duration');
            $table->dropColumn('category');
            $table->dropColumn('level');
        });
    }
};
