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
        Schema::create('header_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_url')->nullable();
            $table->text('logo_data_url')->nullable();
            $table->string('brand_text')->nullable();
            $table->string('home_label')->nullable();
            $table->string('about_label')->nullable();
            $table->string('features_label')->nullable();
            $table->string('pricing_label')->nullable();
            $table->string('testimonials_label')->nullable();
            $table->string('other_projects_label')->nullable();
            $table->string('contact_label')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_href')->nullable();
            $table->string('logo_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_settings');
    }
};
