<?php
/**
 * Deployment Verification Script
 * Run this after deployment to verify everything is set up correctly
 * Usage: php verify_deployment.php
 */

echo "🔍 Verifying Deployment Configuration...\n\n";

$errors = [];
$warnings = [];
$success = [];

// 1. Check .env file
echo "1. Checking .env file...\n";
if (!file_exists('.env')) {
    $errors[] = ".env file not found";
    echo "   ❌ .env file not found\n";
} else {
    $envContent = file_get_contents('.env');
    if (strpos($envContent, 'APP_KEY=base64:') === false) {
        $errors[] = "APP_KEY not set in .env";
        echo "   ❌ APP_KEY not set\n";
    } else {
        echo "   ✅ APP_KEY is set\n";
    }
    
    if (strpos($envContent, 'APP_DEBUG=true') !== false && strpos($envContent, 'APP_ENV=production') !== false) {
        $warnings[] = "APP_DEBUG is true in production";
        echo "   ⚠️  APP_DEBUG is true (should be false in production)\n";
    } else {
        echo "   ✅ APP_DEBUG is false\n";
    }
    
    if (strpos($envContent, 'APP_URL=http://localhost') !== false) {
        $warnings[] = "APP_URL is still localhost";
        echo "   ⚠️  APP_URL is localhost (should be production domain)\n";
    } else {
        echo "   ✅ APP_URL is configured\n";
    }
}

// 2. Check storage link
echo "\n2. Checking storage link...\n";
if (is_link('public/storage')) {
    echo "   ✅ Storage symlink exists\n";
} else {
    $errors[] = "Storage symlink not found";
    echo "   ❌ Storage symlink not found. Run: php artisan storage:link\n";
}

// 3. Check required directories
echo "\n3. Checking required directories...\n";
$directories = [
    'storage/app/public/footer',
    'storage/app/public/projects',
    'storage/app/public/team',
    'public/images/team',
    'public/images/Logo',
    'storage/logs',
    'bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        $warnings[] = "Directory missing: $dir";
        echo "   ⚠️  Directory missing: $dir\n";
    } else {
        echo "   ✅ Directory exists: $dir\n";
    }
}

// 4. Check file permissions
echo "\n4. Checking file permissions...\n";
$writableDirs = ['storage', 'bootstrap/cache'];
foreach ($writableDirs as $dir) {
    if (!is_writable($dir)) {
        $errors[] = "Directory not writable: $dir";
        echo "   ❌ Not writable: $dir\n";
    } else {
        echo "   ✅ Writable: $dir\n";
    }
}

// 5. Check database connection
echo "\n5. Checking database connection...\n";
try {
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    \DB::connection()->getPdo();
    echo "   ✅ Database connection successful\n";
} catch (\Exception $e) {
    $errors[] = "Database connection failed: " . $e->getMessage();
    echo "   ❌ Database connection failed\n";
}

// 6. Check migrations
echo "\n6. Checking database tables...\n";
try {
    $tables = [
        'users',
        'footer_settings',
        'header_settings',
        'about_sections',
        'team_members',
        'contact_settings',
        'hero_sliders',
        'features',
        'pricing_plans',
        'testimonials',
        'social_media',
        'our_projects',
        'bookings',
        'videos',
        'amenities',
        'galleries',
    ];
    
    foreach ($tables as $table) {
        try {
            \DB::table($table)->count();
            echo "   ✅ Table exists: $table\n";
        } catch (\Exception $e) {
            $errors[] = "Table missing: $table";
            echo "   ❌ Table missing: $table\n";
        }
    }
} catch (\Exception $e) {
    $warnings[] = "Could not check tables: " . $e->getMessage();
    echo "   ⚠️  Could not verify tables\n";
}

// Summary
echo "\n" . str_repeat("=", 50) . "\n";
echo "VERIFICATION SUMMARY\n";
echo str_repeat("=", 50) . "\n";

if (empty($errors) && empty($warnings)) {
    echo "✅ All checks passed! Deployment looks good.\n";
} else {
    if (!empty($errors)) {
        echo "\n❌ ERRORS (" . count($errors) . "):\n";
        foreach ($errors as $error) {
            echo "   - $error\n";
        }
    }
    
    if (!empty($warnings)) {
        echo "\n⚠️  WARNINGS (" . count($warnings) . "):\n";
        foreach ($warnings as $warning) {
            echo "   - $warning\n";
        }
    }
}

echo "\n";

