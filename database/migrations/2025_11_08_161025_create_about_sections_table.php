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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // hero, history, founder, chairman, mission, vision
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->text('content_2')->nullable();
            $table->text('content_3')->nullable();
            $table->string('image_url')->nullable();
            $table->string('name')->nullable(); // For founder/chairman
            $table->string('position')->nullable(); // For founder/chairman
            $table->json('extra_data')->nullable(); // For additional flexible data
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
