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
        Schema::create('category',function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('category_name');
            $table->string('category_status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

        });
        Schema::create('banners',function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('banner_name');
            $table->string('banner_status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('banners');
    }
};
