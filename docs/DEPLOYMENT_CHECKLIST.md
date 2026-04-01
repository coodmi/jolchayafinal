# Deployment Checklist - জলছায়া Project

Use this checklist to ensure everything is ready for deployment.

## Pre-Deployment

### Environment Setup
- [ ] `.env` file created and configured
- [ ] `APP_ENV=production` set
- [ ] `APP_DEBUG=false` set
- [ ] `APP_URL` set to production domain
- [ ] Database credentials configured
- [ ] `APP_KEY` generated

### Database
- [ ] Database created
- [ ] Database user has proper permissions
- [ ] All migrations ready to run
- [ ] Backup of existing data (if updating)

### Server Requirements
- [ ] PHP >= 8.1 installed
- [ ] Composer installed
- [ ] MySQL/MariaDB running
- [ ] Web server (Apache/Nginx) configured
- [ ] Required PHP extensions installed:
  - [ ] OpenSSL
  - [ ] PDO
  - [ ] Mbstring
  - [ ] Tokenizer
  - [ ] XML
  - [ ] Ctype
  - [ ] JSON
  - [ ] Fileinfo
  - [ ] GD (for image processing)

## Deployment Steps

### 1. Code Deployment
- [ ] Upload all files to server
- [ ] Ensure `.env` is not in version control
- [ ] Verify all files uploaded correctly

### 2. Dependencies
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Verify vendor directory created

### 3. Configuration
- [ ] Create/update `.env` file
- [ ] Set `APP_KEY` (run `php artisan key:generate`)
- [ ] Configure database connection
- [ ] Set `APP_URL` to production domain

### 4. Database
- [ ] Run `php artisan migrate --force`
- [ ] Verify all tables created
- [ ] (Optional) Run `php artisan db:seed` for default data

### 5. Storage
- [ ] Run `php artisan storage:link`
- [ ] Verify `public/storage` symlink exists
- [ ] Create required directories:
  - [ ] `storage/app/public/footer`
  - [ ] `storage/app/public/projects`
  - [ ] `storage/app/public/team`
  - [ ] `public/images/team`
  - [ ] `public/images/Logo`

### 6. Permissions
- [ ] Set `storage` directory: `chmod -R 755 storage`
- [ ] Set `bootstrap/cache`: `chmod -R 755 bootstrap/cache`
- [ ] Set `public` directory: `chmod -R 755 public`

### 7. Cache
- [ ] Clear config: `php artisan config:clear`
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Clear routes: `php artisan route:clear`
- [ ] Clear views: `php artisan view:clear`

### 8. Optimization
- [ ] Cache config: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache views: `php artisan view:cache`

## Post-Deployment Testing

### Frontend Pages
- [ ] Home page loads (`/`)
- [ ] About page loads (`/about`)
- [ ] Gallery page loads (`/gallery`)
- [ ] Projects page loads (`/projects`)
- [ ] All images display correctly
- [ ] Navigation works
- [ ] Mobile responsive

### Admin Dashboard
- [ ] Can login (`/dashboard`)
- [ ] All sections accessible
- [ ] Can view existing data
- [ ] Can add new data
- [ ] Can edit existing data
- [ ] Can delete data
- [ ] File uploads work

### API Endpoints
- [ ] `/api/footer-settings` returns data
- [ ] `/api/header-settings` returns data
- [ ] `/api/about-sections` returns data
- [ ] `/api/team-members` returns data
- [ ] `/api/contact-settings` returns data
- [ ] All other APIs return data

### File Uploads
- [ ] Header logo upload works
- [ ] Footer logo upload works
- [ ] Footer QR code upload works
- [ ] Team member image upload works
- [ ] Chairman message image upload works
- [ ] Project image upload works
- [ ] Gallery image upload works
- [ ] Video poster upload works
- [ ] All uploaded images display correctly

### Database Sections
- [ ] Header settings saved and displayed
- [ ] Footer settings saved and displayed
- [ ] About sections (founder, chairman message, other) saved and displayed
- [ ] Team members saved and displayed
- [ ] Hero sliders saved and displayed
- [ ] Features saved and displayed
- [ ] Pricing plans saved and displayed
- [ ] Testimonials saved and displayed
- [ ] Social media links saved and displayed
- [ ] Projects saved and displayed
- [ ] Videos saved and displayed
- [ ] Amenities saved and displayed
- [ ] Gallery items saved and displayed
- [ ] Bookings saved and displayed

### Functionality
- [ ] Contact form submits successfully
- [ ] Booking form submits successfully
- [ ] CTA button redirects correctly
- [ ] Navigation links work
- [ ] Smooth scrolling works
- [ ] Mobile menu works
- [ ] All dynamic content loads

## Critical Checks

### Image Paths
- [ ] No `localhost` references in image URLs
- [ ] Storage images accessible via `/storage/`
- [ ] Public images accessible via `/images/`
- [ ] All image paths use relative URLs or `asset()` helper

### Environment Variables
- [ ] `APP_URL` matches production domain
- [ ] Database credentials correct
- [ ] `APP_DEBUG=false` in production
- [ ] `APP_ENV=production`

### Security
- [ ] `.env` file not publicly accessible
- [ ] `storage` directory not publicly accessible (except `storage/app/public`)
- [ ] Admin routes protected with authentication
- [ ] CSRF protection enabled

## Rollback Plan

If something goes wrong:
1. Restore database backup
2. Restore file backups
3. Revert code changes
4. Clear all caches
5. Verify `.env` configuration

## Support

If you encounter issues:
1. Check `storage/logs/laravel.log` for errors
2. Enable `APP_DEBUG=true` temporarily to see errors
3. Verify file permissions
4. Check database connection
5. Verify storage link exists

