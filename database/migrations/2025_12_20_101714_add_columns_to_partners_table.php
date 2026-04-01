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
        Schema::table('partners', function (Blueprint $table) {
            // Check and add columns if they don't exist
            if (!Schema::hasColumn('partners', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('partners', 'logo_path')) {
                $table->string('logo_path')->nullable()->after('name');
            }
            if (!Schema::hasColumn('partners', 'website_url')) {
                $table->string('website_url')->nullable()->after('logo_path');
            }
            if (!Schema::hasColumn('partners', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('website_url');
            }
            if (!Schema::hasColumn('partners', 'order')) {
                $table->integer('order')->default(0)->after('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn(['name', 'logo_path', 'website_url', 'is_active', 'order']);
        });
    }
};
