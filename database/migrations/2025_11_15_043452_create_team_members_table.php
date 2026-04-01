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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'founder' or 'chairman'
            $table->string('name');
            $table->string('position')->nullable(); // designation
            $table->text('content')->nullable(); // first paragraph
            $table->text('content_2')->nullable(); // second paragraph
            $table->text('content_3')->nullable(); // third paragraph
            $table->string('image_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
