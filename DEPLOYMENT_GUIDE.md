# Deployment Guide - জলছায়া Project

This guide will help you deploy the project and ensure all data is saved in the database and all sections work perfectly after deployment.

## Pre-Deployment Checklist

### 1. Database Setup

#### Run Migrations
```bash
php artisan migrate
```

#### Run Seeders (Optional - for default data)
```bash
php artisan db:seed
```

#### Required Database Tables:
- ✅ users
- ✅ footer_settings
- ✅ header_settings
- ✅ about_sections
- ✅ team_members
- ✅ contact_settings
- ✅ hero_sliders
- ✅ features
- ✅ pricing_plans
- ✅ testimonials
- ✅ social_media
- ✅ our_projects
- ✅ bookings
- ✅ videos
- ✅ amenities
- ✅ galleries
- ✅ contact_form_fields
- ✅ project_sections
- ✅ prokolpomaps

### 2. Environment Configuration

Create/Update `.env` file with production settings:

```env
APP_NAME="জলছায়া"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

FILESYSTEM_DISK=public
```

**Important:** 
- Set `APP_DEBUG=false` for production
- Set `APP_URL` to your actual domain
- Generate new `APP_KEY` if needed: `php artisan key:generate`

### 3. Storage Setup

#### Create Storage Link
```bash
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public`

#### Required Directories (will be created automatically):
- `storage/app/public/footer/` - Footer images (QR, logo)
- `storage/app/public/projects/` - Project images
- `storage/app/public/team/` - Team member images
- `public/images/team/` - Team member images (if using public path)
- `public/images/Logo/` - Logo images

### 4. File Permissions

Set proper permissions:
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public
```

### 5. Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### 6. Optimize for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Post-Deployment Verification

### 1. Test All Sections

#### Frontend Pages:
- ✅ Home Page (`/`)
- ✅ About Page (`/about`)
- ✅ Gallery Page (`/gallery`)
- ✅ Projects Page (`/projects`)

#### Admin Dashboard:
- ✅ Login (`/dashboard`)
- ✅ Header Settings
- ✅ Footer Settings
- ✅ About Sections (Board Members, Chairman Message, Other Members)
- ✅ Hero Sliders
- ✅ Features
- ✅ Pricing Plans
- ✅ Testimonials
- ✅ Social Media
- ✅ Projects
- ✅ Videos
- ✅ Amenities
- ✅ Gallery
- ✅ Bookings

### 2. Test File Uploads

Verify these uploads work:
- ✅ Header Logo
- ✅ Footer Logo & QR Code
- ✅ Team Member Images
- ✅ Chairman Message Image
- ✅ Project Images
- ✅ Gallery Images
- ✅ Video Posters
- ✅ Hero Slider Images

### 3. Test API Endpoints

Verify these APIs return data:
- ✅ `/api/footer-settings`
- ✅ `/api/header-settings`
- ✅ `/api/about-sections?section_key=founder_title`
- ✅ `/api/about-sections?section_key=chairman_message`
- ✅ `/api/team-members?type=founder`
- ✅ `/api/team-members?type=chairman`
- ✅ `/api/team-members?type=other`
- ✅ `/api/contact-settings`
- ✅ `/api/hero-sliders`
- ✅ `/api/features`
- ✅ `/api/pricing-plans`
- ✅ `/api/testimonials`
- ✅ `/api/social-media`
- ✅ `/api/our-projects`
- ✅ `/api/videos`
- ✅ `/api/amenities`
- ✅ `/api/galleries`

### 4. Verify Image Paths

All images should load correctly:
- Storage images: `/storage/{path}`
- Public images: `/images/{path}`
- No localhost references in URLs

## Common Issues & Solutions

### Issue: Images not loading
**Solution:**
1. Run `php artisan storage:link`
2. Check file permissions: `chmod -R 755 storage public`
3. Verify `APP_URL` in `.env` is correct
4. Clear cache: `php artisan cache:clear`

### Issue: 500 Error
**Solution:**
1. Check `APP_DEBUG=true` temporarily to see error
2. Check logs: `storage/logs/laravel.log`
3. Verify database connection in `.env`
4. Run `php artisan config:clear`

### Issue: CSS/JS not loading
**Solution:**
1. Check `APP_URL` in `.env`
2. Clear view cache: `php artisan view:clear`
3. Verify asset paths in views use `asset()` helper

### Issue: Database connection error
**Solution:**
1. Verify database credentials in `.env`
2. Check database server is running
3. Verify database exists
4. Check user permissions

## Deployment Commands Summary

```bash
# 1. Install dependencies (if needed)
composer install --optimize-autoloader --no-dev

# 2. Set environment
cp .env.example .env
# Edit .env with production values

# 3. Generate key
php artisan key:generate

# 4. Run migrations
php artisan migrate --force

# 5. Create storage link
php artisan storage:link

# 6. Clear and cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 7. Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 8. Set permissions
chmod -R 755 storage bootstrap/cache public
```

## Data Backup Before Deployment

### Export Database
```bash
mysqldump -u username -p database_name > backup.sql
```

### Backup Uploaded Files
```bash
tar -czf storage_backup.tar.gz storage/app/public
tar -czf images_backup.tar.gz public/images
```

## After Deployment

1. ✅ Test admin login
2. ✅ Verify all sections load data from database
3. ✅ Test file uploads (upload a test image)
4. ✅ Verify images display correctly
5. ✅ Test form submissions (contact form, bookings)
6. ✅ Check mobile responsiveness
7. ✅ Verify all navigation links work
8. ✅ Test CTA button redirects

## Notes

- All data is stored in database (no hardcoded content)
- Images are stored in `storage/app/public` (accessible via `/storage`)
- Static images can be in `public/images`
- All API endpoints use database queries
- Frontend dynamically loads data from APIs
- Admin dashboard allows full CRUD operations

