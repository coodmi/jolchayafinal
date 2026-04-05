<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hero_sliders', function (Blueprint $table) {
            $table->text('tagline')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('hero_sliders', function (Blueprint $table) {
            $table->dropColumn('tagline');
        });
    }
};
