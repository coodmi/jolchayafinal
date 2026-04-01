<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->text('project_address')->nullable();
            $table->text('contact_address')->nullable();
            $table->json('quick_links')->nullable();
            $table->json('legal_links')->nullable();
            $table->json('social_links')->nullable();
            $table->string('map_url')->nullable();
            $table->string('bottom_text')->nullable();
            $table->string('qr_image_path')->nullable();
            $table->string('qr_section_title')->nullable();
            $table->string('map_button_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
