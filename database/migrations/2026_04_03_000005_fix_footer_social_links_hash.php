<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $row = DB::table('footer_settings')->first();
        if (!$row) return;

        $social = json_decode($row->social_links, true);
        if (!is_array($social)) return;

        // Replace "#" placeholder with null/empty
        foreach ($social as $key => $val) {
            if ($val === '#' || $val === '') {
                $social[$key] = null;
            }
        }

        DB::table('footer_settings')->where('id', $row->id)
            ->update(['social_links' => json_encode($social)]);
    }

    public function down(): void {}
};
