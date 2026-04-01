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
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->string('concern_title')->nullable()->after('qr_section_title');
            $table->string('concern_image_path')->nullable()->after('concern_title');
            $table->string('concern_url')->nullable()->after('concern_image_path');
            $table->string('nex_real_estate_url')->nullable()->after('bottom_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->dropColumn(['concern_title', 'concern_image_path', 'concern_url', 'nex_real_estate_url']);
        });
    }
};
