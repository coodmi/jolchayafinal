# জলছায়া (Jolchaya) - Real Estate Website

A modern, responsive real estate website built with Laravel for showcasing residential plots and properties.

## Zip with windows 7-Zip

```bash
"/c/Program Files/7-Zip/7z.exe" a -tzip ../jolchaya.zip . '-xr!node_modules' '-xr!.git' -mx=1
```

### cPanel Deployment

**Step 1: Install Dependencies**
```bash
composer install --optimize-autoloader --no-dev
```

**Step 2: Run Deployment Commands**
```bash
php artisan key:generate && php artisan migrate:fresh --seed && rm -rf public/storage && php artisan storage:link
```

**One-Line Deployment (if composer already installed):**
```bash
composer install --optimize-autoloader --no-dev && php artisan key:generate && php artisan migrate:fresh --seed && rm -rf public/storage && php artisan storage:link
```

**Troubleshooting:**
- If you get vendor/autoload errors, run `composer install` first
- Make sure .env file is properly configured with database credentials
- Ensure public_html or public directory points to the `public` folder
- Set proper permissions: `chmod -R 755 storage bootstrap/cache`


This is a laravel blade project and in the admin panel pages of this website there are manY places 

This is a big tasks so please create a tasklist about it that we need to work on and then please complete those todos one bY one sYStemiticallY as possible and also please don't ask anY questions and do it in one go!


On this project almost all title and subtitle not updated properlY so please find out all those places and update them accordinglY on the frontend....

Dont like this ..I want to this section can be editable and addable from the admin panel so please do that as well...

Now I want to add "Subidha jog korun" Button when pressed then it will open a input box then admin can add subidha to the input box and again pressed "Subidha jog korun" button then open another input box like this admin can add multiple subidha and all those subidha will be shown in the frontend as a list under the "Subidha" section...and must be editable from the admin panel as well...add X button to remove any subidha from the list...


When clicked "➕ সুবিধা যোগ করুন" then upper section automaticallY unmarked ..actuallY it showing emptY