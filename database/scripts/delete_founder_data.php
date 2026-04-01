<?php

/**
 * Script to permanently delete all founder/board member data from database
 * Run this with: php artisan tinker < database/scripts/delete_founder_data.php
 * Or run: php -r "require 'vendor/autoload.php'; \$app = require_once 'bootstrap/app.php'; \$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap(); require 'database/scripts/delete_founder_data.php';"
 */

use App\Models\AboutSection;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

echo "Starting deletion of founder/board member data...\n\n";

// Delete founder_title section
$founderTitle = AboutSection::where('section_key', 'founder_title')->first();
if ($founderTitle) {
    echo "Deleting founder_title section (ID: {$founderTitle->id})...\n";
    $founderTitle->delete();
    echo "✓ Deleted founder_title section\n\n";
} else {
    echo "No founder_title section found\n\n";
}

// Delete all founder type team members
$founderMembers = TeamMember::where('type', 'founder')->get();
$count = $founderMembers->count();
if ($count > 0) {
    echo "Found {$count} founder type team member(s)...\n";
    foreach ($founderMembers as $member) {
        // Delete associated image if exists
        if ($member->image_url && file_exists(public_path($member->image_url))) {
            try {
                unlink(public_path($member->image_url));
                echo "  - Deleted image: {$member->image_url}\n";
            } catch (\Exception $e) {
                echo "  - Warning: Could not delete image {$member->image_url}: {$e->getMessage()}\n";
            }
        }
        echo "  - Deleting team member: {$member->name} (ID: {$member->id})\n";
        $member->delete();
    }
    echo "✓ Deleted {$count} founder type team member(s)\n\n";
} else {
    echo "No founder type team members found\n\n";
}

// Clear all related cache
echo "Clearing cache...\n";
Cache::forget('about_page_v2');
Cache::forget('about_section_founder_title');
Cache::forget('about_sections_all');
Cache::forget('team_members_founder_frontend');
Cache::forget('team_members_founder_admin');
Cache::forget('team_members_all_frontend');
Cache::forget('team_members_all_admin');
echo "✓ Cache cleared\n\n";

echo "Deletion complete!\n";
echo "Summary:\n";
echo "- Deleted founder_title section: " . ($founderTitle ? "Yes" : "No") . "\n";
echo "- Deleted founder team members: {$count}\n";
echo "- Cache cleared: Yes\n";

