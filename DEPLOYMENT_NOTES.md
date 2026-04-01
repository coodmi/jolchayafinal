# Critical Deployment Notes

## Important: Before Deployment

### 1. Environment Variables (.env)

**CRITICAL:** Update these values in `.env`:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com  # ⚠️ CHANGE THIS!

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 2. Storage Configuration

**All file uploads use:**
- `storage/app/public/` - For uploaded files (accessible via `/storage/`)
- `public/images/` - For static/default images

**After deployment, run:**
```bash
php artisan storage:link
```

This creates: `public/storage` → `storage/app/public`

### 3. Image Path Handling

The code automatically handles different image path formats:
- `/storage/...` - Uploaded files (via storage:link)
- `/images/...` - Static files in public directory
- Full URLs (http/https) - External images

**No localhost references** - All localhost URLs are automatically removed in JavaScript.

### 4. Database Tables Required

All these tables will be created by migrations:

**Core Settings:**
- `footer_settings` - Footer content, links, social media
- `header_settings` - Header logo, navigation labels, CTA
- `contact_settings` - Contact form configuration

**Content Sections:**
- `about_sections` - About page sections (founder title, chairman message)
- `team_members` - Board members, chairmen, other members
- `hero_sliders` - Homepage hero slider
- `features` - Features section
- `pricing_plans` - Pricing plans
- `testimonials` - Customer testimonials
- `our_projects` - Other projects
- `videos` - Video gallery
- `amenities` - Amenities list
- `galleries` - Image gallery
- `project_sections` - Project sections
- `prokolpomaps` - Project maps

**Forms:**
- `contact_form_fields` - Dynamic contact form fields
- `bookings` - Booking submissions

**Other:**
- `social_media` - Social media links
- `users` - Admin users

### 5. File Upload Locations

**Team Members:**
- Path: `public/images/team/`
- URL: `/images/team/filename.jpg`

**Projects:**
- Path: `storage/app/public/projects/`
- URL: `/storage/projects/filename.jpg`

**Footer:**
- QR Code: `storage/app/public/footer/`
- Logo: `storage/app/public/footer/`
- URL: `/storage/footer/filename.jpg`

**Other uploads:**
- Hero sliders: `storage/app/public/hero/`
- Gallery: `storage/app/public/gallery/`
- Videos: `storage/app/public/videos/`

### 6. API Endpoints

All data is loaded via API endpoints:

**Public APIs (no auth required):**
- `/api/footer-settings`
- `/api/header-settings`
- `/api/about-sections?section_key=...`
- `/api/team-members?type=...`
- `/api/contact-settings`
- `/api/hero-sliders`
- `/api/features`
- `/api/pricing-plans`
- `/api/testimonials`
- `/api/social-media`
- `/api/our-projects`
- `/api/videos`
- `/api/amenities`
- `/api/galleries`

**Admin APIs (auth required):**
- `/admin/footer-settings` (POST)
- `/admin/header-settings` (POST)
- `/admin/about-sections` (POST, DELETE)
- `/admin/team-members` (POST, PUT, DELETE)
- `/admin/testimonials` (POST, PUT, DELETE)
- `/admin/social-media` (POST, PUT, DELETE)
- And more...

### 7. Frontend Data Loading

**All sections dynamically load data:**
- Home page: Hero, Features, Pricing, Testimonials, etc.
- About page: Team members, Chairman message, Sections
- Gallery page: Gallery items
- Projects page: Other projects

**Auto-refresh mechanisms:**
- localStorage events for cross-tab updates
- Custom events for same-tab updates
- Polling fallback (every 5-30 seconds)

### 8. Admin Dashboard Features

**All sections are fully manageable:**
- ✅ Create, Read, Update, Delete (CRUD)
- ✅ Image uploads with preview
- ✅ Real-time preview
- ✅ Success/Error notifications
- ✅ Form validation
- ✅ Data persistence in database

### 9. Common Deployment Issues

**Issue: Images not loading**
- Solution: Run `php artisan storage:link`
- Check: `public/storage` symlink exists
- Verify: File permissions (755)

**Issue: 500 Error**
- Check: `storage/logs/laravel.log`
- Verify: Database connection
- Check: `.env` file configuration
- Run: `php artisan config:clear`

**Issue: CSS/JS not loading**
- Verify: `APP_URL` in `.env`
- Check: Asset paths use `asset()` helper
- Clear: `php artisan view:clear`

**Issue: Database errors**
- Verify: Database credentials in `.env`
- Check: Database exists
- Verify: User has permissions
- Run: `php artisan migrate`

### 10. Post-Deployment Testing

**Test these in order:**

1. **Frontend:**
   - [ ] Home page loads
   - [ ] All images display
   - [ ] Navigation works
   - [ ] Contact form submits
   - [ ] Mobile responsive

2. **Admin:**
   - [ ] Can login
   - [ ] Can view all sections
   - [ ] Can add/edit/delete data
   - [ ] File uploads work
   - [ ] Images display after upload

3. **Database:**
   - [ ] All tables exist
   - [ ] Data persists after save
   - [ ] Data loads correctly
   - [ ] No errors in logs

### 11. Backup Strategy

**Before deployment:**
```bash
# Database backup
mysqldump -u username -p database_name > backup_$(date +%Y%m%d).sql

# Files backup
tar -czf storage_backup_$(date +%Y%m%d).tar.gz storage/app/public
tar -czf images_backup_$(date +%Y%m%d).tar.gz public/images
```

### 12. Quick Deployment Commands

```bash
# Full deployment
./deploy.sh

# Or manually:
composer install --optimize-autoloader --no-dev
php artisan key:generate
php artisan migrate --force
php artisan storage:link
mkdir -p storage/app/public/{footer,projects,team}
mkdir -p public/images/{team,Logo}
chmod -R 755 storage bootstrap/cache public
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 13. Verification

After deployment, run:
```bash
php verify_deployment.php
```

This will check:
- ✅ .env configuration
- ✅ Storage link
- ✅ Directory structure
- ✅ File permissions
- ✅ Database connection
- ✅ All required tables

## Success Criteria

✅ All pages load without errors
✅ All images display correctly
✅ Admin can login and manage content
✅ File uploads work
✅ Data persists in database
✅ No localhost references in URLs
✅ Mobile responsive
✅ All forms submit successfully

## Support

If issues occur:
1. Check `storage/logs/laravel.log`
2. Enable `APP_DEBUG=true` temporarily
3. Verify all steps in checklist
4. Run verification script

