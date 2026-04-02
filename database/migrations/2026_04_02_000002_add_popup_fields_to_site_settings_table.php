<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->boolean('popup_enabled')->default(false);
            $table->string('popup_title')->nullable();
            $table->string('popup_subtitle')->nullable();
            $table->string('popup_btn_text')->nullable();
            $table->string('popup_btn_link')->nullable();
            $table->string('popup_note')->nullable();
            $table->string('popup_image')->nullable();
            $table->string('popup_bg_color')->default('#0d3d29');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['popup_enabled','popup_title','popup_subtitle','popup_btn_text','popup_btn_link','popup_note','popup_image','popup_bg_color']);
        });
    }
};
