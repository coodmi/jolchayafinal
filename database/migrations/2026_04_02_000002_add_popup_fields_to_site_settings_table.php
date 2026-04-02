<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->boolean('popup_enabled')->default(false)->after('favicon_url');
            $table->string('popup_title')->nullable()->after('popup_enabled');
            $table->string('popup_subtitle')->nullable()->after('popup_title');
            $table->string('popup_btn_text')->nullable()->after('popup_subtitle');
            $table->string('popup_btn_link')->nullable()->after('popup_btn_text');
            $table->string('popup_note')->nullable()->after('popup_btn_link');
            $table->string('popup_image')->nullable()->after('popup_note');
            $table->string('popup_bg_color')->default('#0d3d29')->after('popup_image');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['popup_enabled','popup_title','popup_subtitle','popup_btn_text','popup_btn_link','popup_note','popup_image','popup_bg_color']);
        });
    }
};
