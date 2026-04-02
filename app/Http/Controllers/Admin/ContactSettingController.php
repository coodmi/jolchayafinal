<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    /**
     * Get contact settings (public API)
     */
    public function index()
    {
        $settings = ContactSetting::first();
        
        if (!$settings) {
            // Return default values if no settings exist
            return response()->json([
                'title' => 'যোগাযোগ করুন',
                'subtitle' => 'আমরা আপনার সেবায় প্রস্তুত',
                'phone_icon' => '📞',
                'phone_label' => 'ফোন',
                'phone_numbers' => '+880 1991 995 995<br>+880 1991 994 994<br>+880 1997 995 995<br>+880 1677 600 000',
                'email_icon' => '📧',
                'email_label' => 'ইমেইল',
                'email_address' => 'hello.nexgroup@gmail.com',
                'web_icon' => '🌐',
                'web_label' => 'ওয়েবসাইট',
                'web_address' => 'www.jolchaya.com',
                'address_icon' => '📍',
                'address_label' => 'ঠিকানা',
                'address_text' => 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস<br>খুলনা, বাংলাদেশ',
                'form_title' => 'বুকিং তথ্য পাঠান',
            ]);
        }
        
        return response()->json($settings);
    }

    /**
     * Get contact settings for admin
     */
    public function show()
    {
        $settings = ContactSetting::first();
        
        if (!$settings) {
            return response()->json([
                'title' => 'যোগাযোগ করুন',
                'subtitle' => 'আমরা আপনার সেবায় প্রস্তুত',
                'phone_icon' => '📞',
                'phone_label' => 'ফোন',
                'phone_numbers' => '+880 1991 995 995<br>+880 1991 994 994<br>+880 1997 995 995<br>+880 1677 600 000',
                'email_icon' => '📧',
                'email_label' => 'ইমেইল',
                'email_address' => 'hello.nexgroup@gmail.com',
                'web_icon' => '🌐',
                'web_label' => 'ওয়েবসাইট',
                'web_address' => 'www.jolchaya.com',
                'address_icon' => '📍',
                'address_label' => 'ঠিকানা',
                'address_text' => 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস<br>খুলনা, বাংলাদেশ',
                'form_title' => 'বুকিং তথ্য পাঠান',
            ]);
        }
        
        return response()->json($settings);
    }

    /**
     * Create or update contact settings
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'phone_icon' => 'nullable|string|max:10',
            'phone_label' => 'nullable|string|max:255',
            'phone_numbers' => 'nullable|string',
            'email_icon' => 'nullable|string|max:10',
            'email_label' => 'nullable|string|max:255',
            'email_address' => 'nullable|string|max:255',
            'web_icon' => 'nullable|string|max:10',
            'web_label' => 'nullable|string|max:255',
            'web_address' => 'nullable|string|max:255',
            'address_icon' => 'nullable|string|max:10',
            'address_label' => 'nullable|string|max:255',
            'address_text' => 'nullable|string',
            'form_title' => 'nullable|string|max:255',
            'form_bg_color' => 'nullable|string|max:20',
            'btn_color' => 'nullable|string|max:20',
            'btn_text_color' => 'nullable|string|max:20',
        ]);

        $settings = ContactSetting::firstOrCreate([]);
        $settings->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'যোগাযোগ সেটিংস সফলভাবে সংরক্ষণ করা হয়েছে',
            'data' => $settings
        ]);
    }
}
