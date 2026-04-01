<?php

namespace App\Http\Controllers;

use App\Models\Admin\Video;
use App\Models\Admin\Gallery;
use App\Models\HeroSlider;
use App\Models\OurProject;
use App\Models\TeamMember;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Models\Admin\Amenity;
use App\Models\AmenitySetting;
use App\Models\News;
use App\Models\DiscountOffer;
use App\Models\FooterSetting;
use App\Models\HeaderSetting;
use App\Models\ContactSetting;
use App\Models\ProjectSection;
use App\Models\PricingPlan;
use App\Models\PricingSetting;
use App\Models\Feature;
use App\Models\FeatureSetting;

class HomeController extends Controller
{
    public function landingPage()
    {
        // No cache for real-time updates
        $data = [
            'projectSections' => ProjectSection::all()->keyBy('section_key'),
            'footerSettings' => FooterSetting::first(),
            'headerSettings' => HeaderSetting::first(),
            'heroSliders' => HeroSlider::where('is_active', true)->orderBy('order')->get(),
            'testimonials' => Testimonial::where('is_active', true)->orderBy('order')->limit(10)->get(),
            'ourProjects' => OurProject::where('is_active', true)->orderBy('order')->limit(12)->get(),
            'socialMedia' => SocialMedia::where('is_active', true)->orderBy('order')->limit(10)->get(),
            'contactSettings' => ContactSetting::first(),
            'amenities' => Amenity::all(),
            'amenitySettings' => AmenitySetting::first(),
            'videos' => Video::where('is_active', true)->orderByDesc('id')->limit(10)->get(),
            'galleries' => Gallery::orderBy('order')->limit(9)->get(),
            'discountOffers' => DiscountOffer::where('is_active', true)->orderBy('order')->get(),
            'allNews' => News::where('is_active', true)->orderBy('order')->orderByDesc('published_at')->get(),
            'pricingPlans' => PricingPlan::where('is_active', true)->orderBy('order')->get(),
            'pricingSettings' => PricingSetting::first(),
            'features' => Feature::where('is_active', true)->orderBy('order')->get(),
            'featureSettings' => FeatureSetting::first(),
        ];

        $videoData = collect($data['videos'])->map(function ($v) {
            return [
                'title' => $v->title,
                'description' => $v->description,
                'poster' => $v->poster,
                'url' => $v->url,
                'link' => $v->url,
                'cta' => 'ভিডিও দেখুন'
            ];
        })->toArray();

        $response = response()->view('pages.landing', array_merge($data, ['videoData' => $videoData]));
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');
        return $response;
    }

    public function aboutPage()
    {
        // Don't use cache for real-time updates
        $data = [
            'footerSettings' => FooterSetting::first(),
            'headerSettings' => HeaderSetting::first(),
            'aboutSections' => AboutSection::where('is_active', true)->get()->keyBy('section_key'),
        ];

        $response = response()->view('pages.about', $data);
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');
        return $response;
    }

    public function othersProjects()
    {
        $data = [
            'footerSettings' => FooterSetting::first(),
            'headerSettings' => HeaderSetting::first(),
            'ourProjects' => OurProject::where('is_active', true)->orderByDesc('created_at')->get(),
            'projectSections' => ProjectSection::all()->keyBy('section_key'),
        ];

        $response = response()->view('pages.othersProject', $data);
        $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');
        return $response;
    }

    public function newsPage(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');
        
        $query = News::where('is_active', true);
        
        if ($category) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        
        $data = [
            'footerSettings' => FooterSetting::first(),
            'headerSettings' => HeaderSetting::first(),
            'allNews' => $query->orderBy('order')
                ->orderByDesc('published_at')
                ->paginate(6)
                ->appends($request->query()),
            'projectSections' => ProjectSection::all()->keyBy('section_key'),
            'selectedCategory' => $category,
            'categories' => News::where('is_active', true)->select('category')->distinct()->pluck('category')->filter(),
        ];

        return view('pages.news', $data);
    }

    public function newsDetail($id)
    {
        $news = News::findOrFail($id);
        $data = [
            'footerSettings' => FooterSetting::first(),
            'headerSettings' => HeaderSetting::first(),
            'news' => $news,
            'recentNews' => News::where('is_active', true)
                ->where('id', '!=', $id)
                ->orderByDesc('published_at')
                ->limit(5)
                ->get(),
        ];

        return view('pages.newsDetail', $data);
    }

    public function searchNews(Request $request)
    {
        $q = $request->query('q');
        if (!$q || strlen($q) < 2) return response()->json([]);

        $news = News::where('is_active', true)
            ->where('title', 'like', "%{$q}%")
            ->limit(10)
            ->get(['id', 'title']);

        return response()->json($news);
    }

    public function getNewsApi($id)
    {
        $news = News::findOrFail($id);
        return response()->json([
            'id' => $news->id,
            'title' => $news->title,
            'content' => $news->content,
            'image_url' => $news->image_url,
            'category' => $news->category,
            'published_at' => $news->published_at ? $news->published_at->format('d M, Y') : $news->created_at->format('d M, Y'),
        ]);
    }

    public function dashboard(Request $request)
    {
        // Pre-load registrations data for instant display
        $registrations = \App\Models\PlotRegistration::select([
            'id', 'applicant_name', 'mobile', 'email',
            'project_name', 'plot_no', 'block_no', 'total_price', 'status',
            'created_at', 'applicant_photo'
        ])->orderBy('created_at', 'desc')->paginate(15);

        $registrationStats = [
            'total' => \App\Models\PlotRegistration::count(),
            'pending' => \App\Models\PlotRegistration::where('status', 'pending')->count(),
            'approved' => \App\Models\PlotRegistration::where('status', 'approved')->count(),
            'processing' => \App\Models\PlotRegistration::where('status', 'processing')->count(),
            'rejected' => \App\Models\PlotRegistration::where('status', 'rejected')->count(),
        ];

        return view('admin.dashboard', compact('registrations', 'registrationStats'));
    }
}

