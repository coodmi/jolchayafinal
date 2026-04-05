<?php

use App\Models\Admin\Amenity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\OurProjectController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\HeaderSettingController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\ProjectSectionController;
use App\Http\Controllers\Admin\ContactFormFieldController;
use App\Http\Controllers\Admin\DiscountOfferController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\EventController;


Route::get('/', [HomeController::class, 'landingPage'])->name('home');

Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');

Route::get('/projects', [HomeController::class, 'othersProjects'])->name('projects');

Route::get('/news', [HomeController::class, 'newsPage'])->name('news');
Route::get('/news/{id}', [HomeController::class, 'newsDetail'])->name('news.detail');
Route::get('/api/news/search', [HomeController::class, 'searchNews'])->name('api.news.search');
Route::get('/api/news/{id}', [HomeController::class, 'getNewsApi'])->name('api.news.single');

Route::get('/gallery', function () {
    $galleries = \App\Models\Admin\Gallery::orderBy('order')->paginate(12);
    $footerSettings = \App\Models\FooterSetting::first();
    $headerSettings = \App\Models\HeaderSetting::first();
    return view('pages.gallery', compact('galleries', 'footerSettings', 'headerSettings'));
})->name('gallery');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('admin')->name('dashboard');

// API: Get footer settings
Route::get('/api/footer-settings', function () {
    $settings = \App\Models\FooterSetting::first();
    if (!$settings) {
        return response()->json(['error' => 'No footer settings found'], 404);
    }

    // Ensure all fields are included and properly formatted
    $data = [
        'title' => $settings->title,
        'description' => $settings->description,
        'logo_path' => $settings->logo_path,
        'phone1' => $settings->phone1,
        'phone2' => $settings->phone2,
        'email' => $settings->email,
        'project_address' => $settings->project_address,
        'contact_address' => $settings->contact_address,
        'quick_links' => $settings->quick_links ?? [],
        'legal_links' => $settings->legal_links ?? [],
        'social_links' => $settings->social_links ?? [],
        'map_url' => $settings->map_url,
        'bottom_text' => $settings->bottom_text,
        'qr_image_path' => $settings->qr_image_path,
        'qr_section_title' => $settings->qr_section_title,
        'map_button_text' => $settings->map_button_text,
        'concern_title' => $settings->concern_title,
        'concern_image_path' => $settings->concern_image_path,
        'concern_url' => $settings->concern_url,
        'concern_logos' => $settings->concern_logos ?? [],
        'nex_real_estate_url' => $settings->nex_real_estate_url,
    ];

    return response()->json($data)
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
})->name('api.footer-settings');

// API: Get hero sliders
Route::get('/api/hero-sliders', function () {
    $sliders = \App\Models\HeroSlider::where('is_active', true)
        ->orderBy('order')
        ->get()
        ->map(function ($slider) {
            $imageUrl = $slider->image_url ?? '';
            // Normalize to relative path
            if ($imageUrl && !str_starts_with($imageUrl, 'http')) {
                $imageUrl = '/' . ltrim($imageUrl, '/');
            }
            return [
                'id' => $slider->id,
                'title' => $slider->title ?? '',
                'subtitle' => $slider->subtitle ?? '',
                'description' => $slider->description ?? '',
                'primary_button_text' => $slider->primary_button_text ?? '',
                'primary_button_link' => $slider->primary_button_link ?? '',
                'secondary_button_text' => $slider->secondary_button_text ?? '',
                'secondary_button_link' => $slider->secondary_button_link ?? '',
                'image_url' => $imageUrl,
                'video_url' => $slider->video_url ?? '',
                'order' => $slider->order ?? 0,
                'is_active' => $slider->is_active ?? false,
            ];
        });

    return response()->json($sliders->values())
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
})->name('api.hero-sliders');

// API: Get social media
Route::get('/api/social-media', function () {
    $socialMedia = \App\Models\SocialMedia::where('is_active', true)->orderBy('order')->get()->map(function ($item) {
        $path = $item->image_path ?? '';
        if ($path && !str_starts_with($path, 'http')) {
            $path = ltrim($path, '/');
            if (!str_starts_with($path, 'social_media/')) {
                $path = 'social_media/' . basename($path);
            }
            $item->image_url = '/storage/' . $path;
        } else {
            $item->image_url = $path;
        }
        return $item;
    });
    return response()->json($socialMedia)
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
})->name('api.social-media');

// API: Get galleries
Route::get('/api/galleries', function () {
    try {
        $galleries = \App\Models\Admin\Gallery::orderBy('order')
            ->orderBy('created_at', 'desc')
            ->limit(9)
            ->get()
            ->map(function ($item) {
                // Use the model's image_url accessor
                return [
                    'id' => $item->id,
                    'title' => $item->title ?? '',
                    'title_bn' => $item->title_bn ?? '',
                    'category' => $item->category ?? 'exterior',
                    'image_url' => $item->image_url ?? null,
                    'image_path' => $item->image ?? null,
                    'order' => $item->order ?? 0,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            });

        return response()->json($galleries, 200, [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching galleries: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to load galleries'], 500);
    }
})->name('api.galleries');

// API: Get testimonials (returns all for admin, frontend will filter active ones)
Route::get('/api/testimonials', function () {
    try {
        $testimonials = \App\Models\Testimonial::orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                // Ensure all required fields are present
                return [
                    'id' => $item->id,
                    'name' => $item->name ?? '',
                    'title' => $item->title ?? '',
                    'quote' => $item->quote ?? '',
                    'avatar' => $item->avatar ?? '',
                    'image_url' => $item->image_url ?? null,
                    'image_path' => $item->image_path ?? null,
                    'order' => $item->order ?? 0,
                    'is_active' => $item->is_active ?? true,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            });

        return response()->json($testimonials, 200, [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching testimonials: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to load testimonials'], 500);
    }
})->name('api.testimonials');

// API: Get our projects
Route::get('/api/our-projects', function () {
    try {
        $projects = \App\Models\OurProject::where('is_active', true)
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($item) {
                // Use the model's image_url accessor
                return [
                    'id' => $item->id,
                    'title' => $item->title ?? '',
                    'description' => $item->description ?? '',
                    'image_url' => $item->image_url ?? null,
                    'image_path' => $item->image_path ?? null,
                    'images' => collect(is_array($item->images) ? $item->images : (json_decode($item->getRawOriginal('images') ?? '[]', true) ?? []))->map(fn($p) => str_starts_with($p, 'http') ? $p : '/storage/' . ltrim($p, '/'))->values()->toArray(),
                    'cta_text' => $item->cta_text ?? 'বিস্তারিত জানুন',
                    'cta_link' => $item->cta_link ?? '#contact',
                    'order' => $item->order ?? 0,
                    'is_active' => $item->is_active ?? true,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            });

        return response()->json($projects, 200, [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching our projects: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to load projects'], 500);
    }
})->name('api.our-projects');

// API: Get contact settings
Route::get('/api/contact-settings', function () {
    $settings = \App\Models\ContactSetting::first();
    if (!$settings) {
        return response()->json(['error' => 'No contact settings found'], 404);
    }
    return response()->json($settings);
})->name('api.contact-settings');

// API: Get contact form fields
Route::get('/api/contact-form-fields', function () {
    $fields = \App\Models\ContactFormField::orderBy('order')->get();
    return response()->json($fields);
})->name('api.contact-form-fields');

// API: Get/Set amenity settings
Route::get('/api/amenity-settings', function () {
    $settings = \App\Models\AmenitySetting::first();
    if (!$settings) {
        $settings = \App\Models\AmenitySetting::create([
            'section_badge' => 'World Class Facilities',
            'section_title' => 'শান্তি, সৌন্দর্য ও আধুনিকতার সমন্বয়',
        ]);
    }
    return response()->json($settings);
})->name('api.amenity-settings');

Route::post('/api/amenity-settings', function (\Illuminate\Http\Request $request) {
    $settings = \App\Models\AmenitySetting::first();
    if (!$settings) {
        $settings = \App\Models\AmenitySetting::create($request->all());
    } else {
        $settings->update($request->all());
    }

    // Clear cache to show updated settings on home page
    cache()->forget('landing_v3');

    return response()->json(['success' => true, 'data' => $settings]);
})->name('api.amenity-settings.store');

// API: Get header settings
Route::get('/api/header-settings', [HeaderSettingController::class, 'index'])->name('api.header-settings');

// API: Get about sections
Route::get('/api/about-sections', [AboutSectionController::class, 'index'])->name('api.about-sections');

// API: Get team members (frontend - only active)
Route::get('/api/team-members', [\App\Http\Controllers\Admin\TeamMemberController::class, 'index'])->name('api.team-members');

// API: Get project sections
Route::get('/api/project-sections', function (\Illuminate\Http\Request $request) {
    if ($request->has('section_key')) {
        $section = \App\Models\ProjectSection::where('section_key', $request->section_key)->first();
        return response()->json($section);
    }

    $sections = \App\Models\ProjectSection::all();
    return response()->json($sections);
})->name('api.project-sections');

// API: Get features
Route::get('/api/features', [FeatureController::class, 'index'])->name('api.features');

// API: Get feature settings
Route::get('/api/feature-settings', [FeatureController::class, 'getSettings'])->name('api.feature-settings');

// API: Get pricing plans
Route::get('/api/pricing-plans', [PricingPlanController::class, 'index'])->name('api.pricing-plans');

// API: Get pricing settings
Route::get('/api/pricing-settings', [PricingPlanController::class, 'getSettings'])->name('api.pricing-settings');

// API: Get discount offers
Route::get('/api/discount-offers', function () {
    return response()->json(\App\Models\DiscountOffer::where('is_active', true)->orderBy('order')->get());
})->name('api.discount-offers');

// API: Get partners


// API: Get Why Choose
Route::get('/api/why-choose', [WhyChooseController::class, 'index'])->name('api.why-choose');

// API: Get FAQs
Route::get('/api/faqs', [FaqController::class, 'index'])->name('api.faqs.index');
Route::get('/api/events', [EventController::class, 'index'])->name('api.events.index');

// API: Get all bookings
Route::get('/api/bookings', [BookingController::class, 'index'])->name('api.bookings.index');

// API: Get visit bookings only (have location or visit_date)
Route::get('/api/visit-bookings', function () {
    $bookings = \App\Models\Booking::whereNotNull('visit_date')
        ->orWhereNotNull('location')
        ->orderBy('created_at', 'desc')
        ->get();
    return response()->json($bookings);
})->name('api.visit-bookings.index');

// API: Create booking (no login required - guests can submit)
Route::post('/api/bookings', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name'      => 'required|string|max:255',
        'phone'     => 'required|string|max:20',
        'email'     => 'nullable|email|max:255',
        'plot_size' => 'nullable|string|max:255',
        'message'   => 'nullable|string'
    ]);

    $validated['user_id'] = auth()->id() ?? null;
    $validated['status']  = 'pending';

    $booking = \App\Models\Booking::create($validated);

    return response()->json([
        'success' => true,
        'message' => 'আপনার বুকিং সফলভাবে জমা হয়েছে। শীঘ্রই আমরা আপনার সাথে যোগাযোগ করব।',
        'data'    => $booking
    ]);
})->name('api.bookings.store');

Route::middleware('admin')->group(function () {
    // Admin: Footer settings
    Route::post('/admin/footer-settings', [FooterSettingController::class, 'store'])->name('admin.footer-settings.store');

    // Admin: Header settings
    Route::post('/admin/header-settings', [HeaderSettingController::class, 'store'])->name('admin.header-settings.store');

    // Admin: Site settings
    Route::get('/admin/site-settings', [SiteSettingController::class, 'index'])->name('admin.site-settings.get');
    Route::post('/admin/site-settings', [SiteSettingController::class, 'store'])->name('admin.site-settings.store');

    // Testimonials API routes
    Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // Social Media API routes
    Route::post('/admin/social-media', [SocialMediaController::class, 'store'])->name('admin.social-media.store');
    Route::put('/admin/social-media/{id}', [SocialMediaController::class, 'update'])->name('admin.social-media.update');
    Route::delete('/admin/social-media/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social-media.destroy');

    // Contact Form Fields API routes
    Route::post('/admin/contact-form-fields', [ContactFormFieldController::class, 'store'])->name('admin.contact-form-fields.store');
    Route::put('/admin/contact-form-fields/{id}', [ContactFormFieldController::class, 'update'])->name('admin.contact-form-fields.update');
    Route::delete('/admin/contact-form-fields/{id}', [ContactFormFieldController::class, 'destroy'])->name('admin.contact-form-fields.destroy');
    Route::get('/admin/contact-form-button', [ContactFormFieldController::class, 'getSubmitButton'])->name('admin.contact-form-button.get');
    Route::post('/admin/contact-form-button', [ContactFormFieldController::class, 'updateSubmitButton'])->name('admin.contact-form-button.update');

    // Hero Slider API routes
    Route::get('/admin/hero-sliders', [HeroSliderController::class, 'index'])->name('admin.hero-sliders.index');
    Route::post('/admin/hero-sliders', [HeroSliderController::class, 'store'])->name('admin.hero-sliders.store');
    Route::put('/admin/hero-sliders/{id}', [HeroSliderController::class, 'update'])->name('admin.hero-sliders.update');
    Route::delete('/admin/hero-sliders/{id}', [HeroSliderController::class, 'destroy'])->name('admin.hero-sliders.destroy');

    // About Section API routes
    Route::post('/admin/about-sections', [AboutSectionController::class, 'store'])->name('admin.about-sections.store');
    Route::put('/admin/about-sections/{id}', [AboutSectionController::class, 'update'])->name('admin.about-sections.update');
    Route::delete('/admin/about-sections/{id}', [AboutSectionController::class, 'destroy'])->name('admin.about-sections.destroy');

    // Team Members API routes (Founders/Chairmen)
    Route::post('/admin/team-members', [TeamMemberController::class, 'store'])->name('admin.team-members.store');
    Route::put('/admin/team-members/{id}', [TeamMemberController::class, 'update'])->name('admin.team-members.update');
    Route::delete('/admin/team-members/{id}', [TeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');

    // Project Section API routes
    Route::post('/admin/project-sections', [ProjectSectionController::class, 'store'])->name('admin.project-sections.store');
    Route::delete('/admin/project-sections/{id}', [ProjectSectionController::class, 'destroy'])->name('admin.project-sections.destroy');

    // Our Projects API routes
    Route::post('/admin/our-projects', [OurProjectController::class, 'store'])->name('admin.our-projects.store');
    Route::put('/admin/our-projects/{id}', [OurProjectController::class, 'update'])->name('admin.our-projects.update');
    Route::delete('/admin/our-projects/{id}', [OurProjectController::class, 'destroy'])->name('admin.our-projects.destroy');
    Route::post('/admin/our-projects/{id}/remove-image', [OurProjectController::class, 'removeImage'])->name('admin.our-projects.remove-image');

    // Contact Settings API routes
    Route::get('/admin/contact-settings', [ContactSettingController::class, 'show'])->name('admin.contact-settings.show');
    Route::post('/admin/contact-settings', [ContactSettingController::class, 'store'])->name('admin.contact-settings.store');

    // Bookings API routes
    Route::put('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
    Route::put('/admin/bookings/{id}/note', [BookingController::class, 'updateNote'])->name('admin.bookings.update-note');
    Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
    Route::post('/admin/bookings/bulk-delete', [BookingController::class, 'bulkDelete'])->name('admin.bookings.bulk-delete');
    Route::get('/admin/bookings/export', [BookingController::class, 'export'])->name('admin.bookings.export');

    // Features API routes
    Route::post('/admin/features', [FeatureController::class, 'store'])->name('admin.features.store');
    Route::put('/admin/features/{id}', [FeatureController::class, 'update'])->name('admin.features.update');
    Route::delete('/admin/features/{id}', [FeatureController::class, 'destroy'])->name('admin.features.destroy');
    Route::post('/admin/feature-settings', [FeatureController::class, 'updateSettings'])->name('admin.feature-settings.update');

    // Pricing Plans API routes
    Route::post('/admin/pricing-plans', [PricingPlanController::class, 'store'])->name('admin.pricing-plans.store');
    Route::put('/admin/pricing-plans/{id}', [PricingPlanController::class, 'update'])->name('admin.pricing-plans.update');
    Route::delete('/admin/pricing-plans/{id}', [PricingPlanController::class, 'destroy'])->name('admin.pricing-plans.destroy');
    Route::post('/admin/pricing-settings', [PricingPlanController::class, 'updateSettings'])->name('admin.pricing-settings.update');
    Route::post('/admin/pricing-plans/upload-image', [PricingPlanController::class, 'uploadImage'])->name('admin.pricing-plans.upload-image');

    // Discount Offers API routes
    Route::get('/admin/discount-offers', [DiscountOfferController::class, 'index'])->name('admin.discount-offers.index');
    Route::post('/admin/discount-offers', [DiscountOfferController::class, 'store'])->name('admin.discount-offers.store');
    Route::put('/admin/discount-offers/{id}', [DiscountOfferController::class, 'update'])->name('admin.discount-offers.update');
    Route::delete('/admin/discount-offers/{id}', [DiscountOfferController::class, 'destroy'])->name('admin.discount-offers.destroy');

    // News API routes
    Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    // Partner API routes
    Route::get('/admin/partners', [PartnerController::class, 'index'])->name('admin.partners.index');
    Route::post('/admin/partners', [PartnerController::class, 'store'])->name('admin.partners.store');
    Route::put('/admin/partners/{id}', [PartnerController::class, 'update'])->name('admin.partners.update');
    Route::delete('/admin/partners/{id}', [PartnerController::class, 'destroy'])->name('admin.partners.destroy');

    // Why Choose API routes
    Route::get('/admin/why-choose', [WhyChooseController::class, 'index'])->name('admin.why-choose.index');
    Route::post('/admin/why-choose', [WhyChooseController::class, 'store'])->name('admin.why-choose.store');
    Route::put('/admin/why-choose/{id}', [WhyChooseController::class, 'update'])->name('admin.why-choose.update');
    Route::delete('/admin/why-choose/{id}', [WhyChooseController::class, 'destroy'])->name('admin.why-choose.destroy');

    // FAQ API routes
    Route::get('/admin/faqs', [FaqController::class, 'index'])->name('admin.faqs.index');
    Route::post('/admin/faqs', [FaqController::class, 'store'])->name('admin.faqs.store');
    Route::put('/admin/faqs/{id}', [FaqController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/admin/faqs/{id}', [FaqController::class, 'destroy'])->name('admin.faqs.destroy');

    // Amenities & Videos & Galleries routes - Resource routes with admin prefix
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('amenities', AmenityController::class);
        Route::resource('videos', VideoController::class);
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('events', EventController::class);
        
        // Plot Registrations routes
        Route::get('registrations', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'index'])->name('registrations.index');
        Route::get('registrations/partial', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'partial'])->name('registrations.partial');
        Route::get('registrations/export', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'export'])->name('registrations.export');
        Route::get('registrations/{registration}', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'show'])->name('registrations.show');
        Route::get('registrations/{registration}/edit', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'edit'])->name('registrations.edit');
        Route::put('registrations/{registration}', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'update'])->name('registrations.update');
        Route::post('registrations/{registration}/status', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'updateStatus'])->name('registrations.update-status');
        Route::delete('registrations/{registration}', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'destroy'])->name('registrations.destroy');
        Route::post('registrations/bulk-delete', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'bulkDelete'])->name('registrations.bulk-delete');
        Route::get('registrations/{registration}/print', [\App\Http\Controllers\Admin\PlotRegistrationController::class, 'print'])->name('registrations.print');
    });
});

// Plot Registration Routes (Protected - Requires Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/registration', [\App\Http\Controllers\PlotRegistrationController::class, 'create'])->name('registration.create');
    Route::post('/registration', [\App\Http\Controllers\PlotRegistrationController::class, 'store'])->name('registration.store');
    Route::get('/registration/success/{registration}', [\App\Http\Controllers\PlotRegistrationController::class, 'success'])->name('registration.success');
});

// Public registration status check
Route::post('/registration/check-status', [\App\Http\Controllers\PlotRegistrationController::class, 'checkStatus'])->name('registration.check-status');

// User Auth routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');

// Forgot Password routes (only for normal users)
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Admin Auth routes
Route::get('/dashboard/login', [AuthController::class, 'adminLoginForm'])->name('admin.login');
Route::post('/dashboard/login', [AuthController::class, 'adminLoginSubmit'])->name('admin.login.submit');

// Logout route (works for both admin and user)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes (protected by user middleware)
Route::middleware('user')->group(function () {
    Route::get('/user/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile', [\App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::put('/user/photo', [\App\Http\Controllers\UserController::class, 'updatePhoto'])->name('user.photo.update');
    Route::put('/user/password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.password.update');
    Route::get('/user/applications', [\App\Http\Controllers\UserController::class, 'applications'])->name('user.applications');
    Route::get('/user/applications/{type}/{id}', [\App\Http\Controllers\UserController::class, 'showApplication'])->name('user.applications.show');
});










