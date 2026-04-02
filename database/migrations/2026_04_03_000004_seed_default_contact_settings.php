<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $existing = DB::table('contact_settings')->first();
        if ($existing) {
            // Just ensure submit_button_text is set
            if (empty($existing->submit_button_text)) {
                DB::table('contact_settings')->where('id', $existing->id)
                    ->update(['submit_button_text' => 'পাঠান', 'updated_at' => now()]);
            }
        }
    }

    public function down(): void {}
};
