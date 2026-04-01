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
        Schema::create('contact_form_fields', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // Field label (e.g., "নাম")
            $table->string('type')->default('text'); // input type: text, email, tel, textarea, etc.
            $table->string('placeholder')->nullable(); // Placeholder text
            $table->boolean('required')->default(false); // Is field required
            $table->integer('order')->default(0); // Display order
            $table->boolean('is_active')->default(true); // Show/hide field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_form_fields');
    }
};
