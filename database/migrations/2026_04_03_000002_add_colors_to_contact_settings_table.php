<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->string('form_bg_color')->default('#0d3d29')->after('form_title');
            $table->string('btn_color')->default('#ffd700')->after('form_bg_color');
            $table->string('btn_text_color')->default('#0d3d29')->after('btn_color');
        });
    }

    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn(['form_bg_color', 'btn_color', 'btn_text_color']);
        });
    }
};
