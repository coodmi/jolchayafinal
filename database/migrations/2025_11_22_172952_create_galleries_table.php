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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // English title
            $table->string('title_bn'); // Bengali title
            $table->enum('category', ['exterior', 'interior', 'landscape', 'amenities'])->default('exterior');
            $table->string('image'); // Image path or URL
            $table->integer('order')->default(0); // For ordering items
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
