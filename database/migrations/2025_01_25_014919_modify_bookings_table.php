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
        Schema::table('bookings', function (Blueprint $table) {
            // First modify the existing column to match our needs
            $table->dropColumn('service_type');
            // Then add the new foreign key column
            $table->foreignId('service_type')->constrained('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('service_type')->after('phone');
            $table->dropForeign(['service_type']);
        });
    }
};
