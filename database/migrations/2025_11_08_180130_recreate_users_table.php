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
        // Drop the table if it already exists
        Schema::dropIfExists('users');

        // Recreate the table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_number')->nullable();
            $table->string('mobile_code')->nullable();
            $table->string('profile_image')->nullable();
            $table->foreignId('role_id')->constrained('rolemaster')->onDelete('cascade');
            $table->tinyInteger('user_status')->default(0)->comment('0 => pending, 1 => approved, 3 => rejected');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('email_notifications')->default(true);
            $table->boolean('dashboard_alerts')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
