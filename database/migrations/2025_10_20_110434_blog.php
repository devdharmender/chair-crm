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
        Schema::create('blog',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('blog_img');
            $table->string('metatitle');
            $table->string('metakeyword');
            $table->string('canonical');
            $table->string('metadesc');
            $table->string('topic');
            $table->text('description');
            $table->integer('blogstatus')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
