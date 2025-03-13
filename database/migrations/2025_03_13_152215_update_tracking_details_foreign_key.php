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
        // Schema::table('tracking_details', function (Blueprint $table) {
        //     // Drop the existing foreign key constraint (if any)
        //     $table->dropForeign(['order_id']);

        //     // Add the corrected foreign key constraint
        //     $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        // });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracking_details', function (Blueprint $table) {
            //
        });
    }
};
