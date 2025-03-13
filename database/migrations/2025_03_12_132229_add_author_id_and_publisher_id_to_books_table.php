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
        Schema::table('books', function (Blueprint $table) {
            $table->string('author_id')->nullable();
            $table->string('publisher_id')->nullable();

            $table->foreign('author_id')->references('author_id')->on('authors')->cascadeOnDelete();
            $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropForeign(['publisher_id']);
            $table->dropColumn(['author_id', 'publisher_id']);
        });
    }
};
