#!/bin/bash

# Deployment Script for জলছায়া Project
# This script automates the deployment process

echo "🚀 Starting Deployment Process..."

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Step 1: Check if .env exists
echo -e "${YELLOW}Step 1: Checking environment file...${NC}"
if [ ! -f .env ]; then
    echo -e "${RED}❌ .env file not found!${NC}"
    echo "Please create .env file from .env.example and configure it."
    exit 1
fi
echo -e "${GREEN}✅ .env file found${NC}"

# Step 2: Install/Update Dependencies
echo -e "${YELLOW}Step 2: Installing dependencies...${NC}"
composer install --optimize-autoloader --no-dev
echo -e "${GREEN}✅ Dependencies installed${NC}"

# Step 3: Generate Application Key (if needed)
echo -e "${YELLOW}Step 3: Checking application key...${NC}"
if ! grep -q "APP_KEY=base64:" .env; then
    php artisan key:generate
    echo -e "${GREEN}✅ Application key generated${NC}"
else
    echo -e "${GREEN}✅ Application key already exists${NC}"
fi

# Step 4: Run Migrations
echo -e "${YELLOW}Step 4: Running database migrations...${NC}"
php artisan migrate --force
echo -e "${GREEN}✅ Migrations completed${NC}"

# Step 5: Create Storage Link
echo -e "${YELLOW}Step 5: Creating storage link...${NC}"
php artisan storage:link
echo -e "${GREEN}✅ Storage link created${NC}"

# Step 6: Create Required Directories
echo -e "${YELLOW}Step 6: Creating required directories...${NC}"
mkdir -p storage/app/public/footer
mkdir -p storage/app/public/projects
mkdir -p storage/app/public/team
mkdir -p public/images/team
mkdir -p public/images/Logo
echo -e "${GREEN}✅ Directories created${NC}"

# Step 7: Set Permissions
echo -e "${YELLOW}Step 7: Setting file permissions...${NC}"
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public
echo -e "${GREEN}✅ Permissions set${NC}"

# Step 8: Clear All Caches
echo -e "${YELLOW}Step 8: Clearing caches...${NC}"
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
echo -e "${GREEN}✅ Caches cleared${NC}"

# Step 9: Optimize for Production
echo -e "${YELLOW}Step 9: Optimizing for production...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo -e "${GREEN}✅ Application optimized${NC}"

# Step 10: Verify Storage Link
echo -e "${YELLOW}Step 10: Verifying storage link...${NC}"
if [ -L public/storage ]; then
    echo -e "${GREEN}✅ Storage link verified${NC}"
else
    echo -e "${RED}❌ Storage link not found!${NC}"
    echo "Run: php artisan storage:link"
fi

echo ""
echo -e "${GREEN}🎉 Deployment completed successfully!${NC}"
echo ""
echo "Next steps:"
echo "1. Verify APP_URL in .env matches your domain"
echo "2. Test admin login at /dashboard"
echo "3. Test file uploads in admin panel"
echo "4. Verify all sections load data correctly"
echo "5. Test frontend pages"

