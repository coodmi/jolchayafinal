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
        Schema::create('prokolpomaps', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique()->default('roadmap');
            $table->string('offer_title')->nullable();
            $table->json('plots')->nullable();      // stores array of 4 plots with size & category
            $table->json('amenities')->nullable();  // stores array of amenities
            $table->text('footer_note')->nullable();
            $table->string('cta_bar')->nullable();
            $table->string('image')->nullable();    // path to uploaded map image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prokolpomaps');
    }
};
