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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('phone_icon')->nullable();
            $table->string('phone_label')->nullable();
            $table->text('phone_numbers')->nullable();
            $table->string('email_icon')->nullable();
            $table->string('email_label')->nullable();
            $table->string('email_address')->nullable();
            $table->string('web_icon')->nullable();
            $table->string('web_label')->nullable();
            $table->string('web_address')->nullable();
            $table->string('address_icon')->nullable();
            $table->string('address_label')->nullable();
            $table->text('address_text')->nullable();
            $table->string('form_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
