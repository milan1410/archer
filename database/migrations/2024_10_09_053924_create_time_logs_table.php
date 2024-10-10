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
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key to users table
            $table->foreignId('subproject_id')->constrained('subprojects')->onDelete('cascade');  // Foreign key to subprojects table
            $table->date('date');  // Date of the log
            $table->time('start_time');  // Start time
            $table->time('end_time');  // End time
            $table->decimal('total_hours', 5, 2);  // Total hours, e.g., 7.50 for 7 hours 30 minutes
            $table->timestamps();  // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_logs');
    }
};
