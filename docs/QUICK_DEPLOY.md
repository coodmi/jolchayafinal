# Quick Deployment Guide

## 🚀 Fast Deployment Steps

### 1. Run Deployment Script
```bash
./deploy.sh
```

### 2. Or Manual Steps:

```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Generate key (if needed)
php artisan key:generate

# Run migrations
php artisan migrate --force

# Create storage link
php artisan storage:link

# Create directories
mkdir -p storage/app/public/{footer,projects,team,header,galleries,hero,videos}
mkdir -p public/images/{team,Logo}

# Set permissions
chmod -R 755 storage bootstrap/cache public

# Clear and cache
php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan view:clear
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

### 3. Verify
```bash
php verify_deployment.php
```

## ✅ Critical .env Settings

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

## 📋 All Data is in Database

✅ Header Settings
✅ Footer Settings  
✅ About Sections (Founder, Chairman Message, Other Members)
✅ Team Members
✅ Hero Sliders
✅ Features
✅ Pricing Plans
✅ Testimonials
✅ Social Media
✅ Projects
✅ Videos
✅ Amenities
✅ Gallery
✅ Bookings
✅ Contact Settings

## 🔗 Storage Paths

- Uploaded files: `storage/app/public/` → accessible via `/storage/`
- Static images: `public/images/` → accessible via `/images/`
- Run `php artisan storage:link` to create symlink

## ✨ Everything Works After Deployment

All sections will work exactly as they do now because:
- All data is stored in database
- All file paths are relative or use asset() helper
- No hardcoded localhost URLs
- All APIs use database queries
- Frontend dynamically loads from APIs

