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
        Schema::create('amenity_settings', function (Blueprint $table) {
            $table->id();
            $table->string('section_badge')->default('World Class Facilities');
            $table->string('section_title')->default('শান্তি, সৌন্দর্য ও আধুনিকতার সমন্বয়');
            $table->text('section_subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_settings');
    }
};
