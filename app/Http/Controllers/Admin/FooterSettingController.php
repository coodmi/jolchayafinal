<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterSettingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'phone1' => ['nullable', 'string', 'max:255'],
            'phone2' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'project_address' => ['nullable', 'string'],
            'contact_address' => ['nullable', 'string'],
            'map_url' => ['nullable', 'string', 'max:2048'],
            'bottom_text' => ['nullable', 'string', 'max:1024'],
            'qr_section_title' => ['nullable', 'string', 'max:255'],
            'map_button_text' => ['nullable', 'string', 'max:255'],
            'qlHomeLabel' => ['nullable', 'string', 'max:255'],
            'qlHomeHref' => ['nullable', 'string', 'max:1024'],
            'qlFeaturesLabel' => ['nullable', 'string', 'max:255'],
            'qlFeaturesHref' => ['nullable', 'string', 'max:1024'],
            'qlPricingLabel' => ['nullable', 'string', 'max:255'],
            'qlPricingHref' => ['nullable', 'string', 'max:1024'],
            'qlContactLabel' => ['nullable', 'string', 'max:255'],
            'qlContactHref' => ['nullable', 'string', 'max:1024'],
            'qlGalleryLabel' => ['nullable', 'string', 'max:255'],
            'qlGalleryHref' => ['nullable', 'string', 'max:1024'],
            'legalPrivacyLabel' => ['nullable', 'string', 'max:255'],
            'legalPrivacyHref' => ['nullable', 'string', 'max:1024'],
            'legalTermsLabel' => ['nullable', 'string', 'max:255'],
            'legalTermsHref' => ['nullable', 'string', 'max:1024'],
            'socialFacebook' => ['nullable', 'string', 'max:1024'],
            'socialInstagram' => ['nullable', 'string', 'max:1024'],
            'socialTwitter' => ['nullable', 'string', 'max:1024'],
            'socialLinkedin' => ['nullable', 'string', 'max:1024'],
            'socialYouTube' => ['nullable', 'string', 'max:1024'],
            'qr_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:5120'],
            'logo_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:7168'], // 7 MB = 7168 KB - Supports any resolution
            'concern_title' => ['nullable', 'string', 'max:255'],
            'concern_url' => ['nullable', 'string', 'max:2048'],
            'concern_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:5120'],
            'concern_logos' => ['nullable', 'string'], // JSON string
            'nex_real_estate_url' => ['nullable', 'string', 'max:2048'],
            'brochure_file' => ['nullable', 'file', 'mimes:pdf,docx,jpg,png', 'max:20480'],
            'master_plan_file' => ['nullable', 'file', 'mimes:pdf,docx,jpg,png', 'max:20480'],
            'price_list_file' => ['nullable', 'file', 'mimes:pdf,docx,jpg,png', 'max:20480'],
        ]);

        $quickLinks = [
            ['label' => $data['qlHomeLabel'] ?? null, 'href' => $data['qlHomeHref'] ?? null],
            ['label' => $data['qlFeaturesLabel'] ?? null, 'href' => $data['qlFeaturesHref'] ?? null],
            ['label' => $data['qlPricingLabel'] ?? null, 'href' => $data['qlPricingHref'] ?? null],
            ['label' => $data['qlContactLabel'] ?? null, 'href' => $data['qlContactHref'] ?? null],
            ['label' => $data['qlGalleryLabel'] ?? null, 'href' => $data['qlGalleryHref'] ?? null],
        ];

        $legalLinks = [
            ['label' => $data['legalPrivacyLabel'] ?? null, 'href' => $data['legalPrivacyHref'] ?? null],
            ['label' => $data['legalTermsLabel'] ?? null, 'href' => $data['legalTermsHref'] ?? null],
        ];

        $social = [
            'facebook'  => ($data['socialFacebook']  ?? '') !== '' ? $data['socialFacebook']  : ($fs->social_links['facebook']  ?? null),
            'instagram' => ($data['socialInstagram'] ?? '') !== '' ? $data['socialInstagram'] : ($fs->social_links['instagram'] ?? null),
            'twitter'   => ($data['socialTwitter']   ?? '') !== '' ? $data['socialTwitter']   : ($fs->social_links['twitter']   ?? null),
            'linkedin'  => ($data['socialLinkedin']  ?? '') !== '' ? $data['socialLinkedin']  : ($fs->social_links['linkedin']  ?? null),
            'youtube'   => ($data['socialYouTube']   ?? '') !== '' ? $data['socialYouTube']   : ($fs->social_links['youtube']   ?? null),
        ];

        // Ensure all social URLs have https:// prefix
        foreach ($social as $key => $val) {
            if ($val && trim($val) !== '' && !str_starts_with($val, 'http://') && !str_starts_with($val, 'https://')) {
                $social[$key] = 'https://' . ltrim($val, '/');
            }
        }

        unset($data['qlHomeLabel'], $data['qlHomeHref'], $data['qlFeaturesLabel'], $data['qlFeaturesHref'], $data['qlPricingLabel'], $data['qlPricingHref'], $data['qlContactLabel'], $data['qlContactHref'], $data['qlGalleryLabel'], $data['qlGalleryHref'], $data['legalPrivacyLabel'], $data['legalPrivacyHref'], $data['legalTermsLabel'], $data['legalTermsHref'], $data['socialFacebook'], $data['socialInstagram'], $data['socialTwitter'], $data['socialLinkedin'], $data['socialYouTube']);

        // Remove non-fillable / file fields from $data before fill()
        unset($data['concern_logos'], $data['concern_image'],
              $data['qr_image'], $data['logo_image'],
              $data['brochure_file'], $data['master_plan_file'], $data['price_list_file']);

        $fs = FooterSetting::first() ?? new FooterSetting();
        $fs->fill($data);
        $fs->quick_links  = $quickLinks;
        $fs->legal_links  = $legalLinks;
        $fs->social_links = $social;

        if ($request->hasFile('qr_image')) {
            $path = $request->file('qr_image')->store('footer', 'public');
            // delete old if exists
            if ($fs->qr_image_path && Storage::disk('public')->exists($fs->qr_image_path)) {
                try {
                    Storage::disk('public')->delete($fs->qr_image_path);
                } catch (\Throwable $e) {
                }
            }
            $fs->qr_image_path = $path;
        }

        if ($request->hasFile('logo_image')) {
            $path = $request->file('logo_image')->store('footer', 'public');
            // delete old if exists (only delete from storage, not public/images)
            if ($fs->logo_path && str_starts_with($fs->logo_path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $fs->logo_path);
                if (Storage::disk('public')->exists($oldPath)) {
                    try {
                        Storage::disk('public')->delete($oldPath);
                    } catch (\Throwable $e) {
                    }
                }
            }
            $fs->logo_path = '/storage/' . $path;
        }

        if ($request->hasFile('concern_image')) {
            $path = $request->file('concern_image')->store('footer', 'public');
            // delete old if exists
            if ($fs->concern_image_path && Storage::disk('public')->exists($fs->concern_image_path)) {
                try {
                    Storage::disk('public')->delete($fs->concern_image_path);
                } catch (\Throwable $e) {
                }
            }
            $fs->concern_image_path = $path;
        }

        // Handle multiple concern logos
        if ($request->has('concern_logos')) {
            $logosMetadata = json_decode($request->input('concern_logos'), true);
            $processedLogos = [];
            
            \Log::info('Processing concern logos', [
                'raw_input' => $request->input('concern_logos'),
                'decoded' => $logosMetadata
            ]);
            
            if (is_array($logosMetadata)) {
                foreach ($logosMetadata as $index => $logoData) {
                    $processedLogo = [
                        'url' => $logoData['url'] ?? '',
                        'image_path' => $logoData['image_path'] ?? ''
                    ];
                    
                    // Check if there's a new file upload for this logo
                    if (isset($logoData['has_new_file']) && isset($logoData['file_index'])) {
                        $fileKey = 'concern_logo_' . $logoData['file_index'];
                        if ($request->hasFile($fileKey)) {
                            $path = $request->file($fileKey)->store('footer', 'public');
                            $processedLogo['image_path'] = $path;
                            \Log::info("Uploaded new logo file: $fileKey -> $path");
                        }
                    }
                    
                    // Only add logos that have an image
                    if (!empty($processedLogo['image_path'])) {
                        $processedLogos[] = $processedLogo;
                        \Log::info("Added logo $index", $processedLogo);
                    }
                }
            }
            
            $fs->concern_logos = $processedLogos;
            \Log::info('Final concern_logos', ['logos' => $processedLogos]);
        }

        if ($request->hasFile('brochure_file')) {
            $path = $request->file('brochure_file')->store('footer/downloads', 'public');
            if ($fs->brochure_path && Storage::disk('public')->exists($fs->brochure_path)) {
                Storage::disk('public')->delete($fs->brochure_path);
            }
            $fs->brochure_path = $path;
        }

        if ($request->hasFile('master_plan_file')) {
            $path = $request->file('master_plan_file')->store('footer/downloads', 'public');
            if ($fs->master_plan_path && Storage::disk('public')->exists($fs->master_plan_path)) {
                Storage::disk('public')->delete($fs->master_plan_path);
            }
            $fs->master_plan_path = $path;
        }

        if ($request->hasFile('price_list_file')) {
            $path = $request->file('price_list_file')->store('footer/downloads', 'public');
            if ($fs->price_list_path && Storage::disk('public')->exists($fs->price_list_path)) {
                Storage::disk('public')->delete($fs->price_list_path);
            }
            $fs->price_list_path = $path;
        }

        $fs->save();

        // Clear cache to refresh footer
        cache()->forget('landing_v3');

        return response()->json(['success' => true, 'message' => 'Footer settings saved']);
    }
}
