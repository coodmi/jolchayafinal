<?php

namespace App\Http\Controllers;

use App\Models\PlotRegistration;
use App\Models\FooterSetting;
use App\Models\HeaderSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlotRegistrationController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        $footerSettings = FooterSetting::first();
        $headerSettings = HeaderSetting::first();
        
        return view('pages.registration', compact('footerSettings', 'headerSettings'));
    }

    /**
     * Store a newly created registration.
     */
    public function store(Request $request)
    {
        \Log::info('Plot Registration Attempt:', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'data' => $request->except(['applicant_photo', 'nominee_photo']),
            'has_applicant_photo' => $request->hasFile('applicant_photo'),
            'has_nominee_photo' => $request->hasFile('nominee_photo'),
        ]);

        try {
            $validated = $request->validate([
                // Applicant - Required
                'applicant_name' => 'required|string|max:255',
                'mobile' => 'required|string|max:20',
                
                // Applicant - Optional
                'father_name' => 'nullable|string|max:255',
                'mother_name' => 'nullable|string|max:255',
                'spouse_name' => 'nullable|string|max:255',
                'mailing_address' => 'nullable|string',
                'permanent_address' => 'nullable|string',
                'nid' => 'nullable|string|max:50',
                'tin' => 'nullable|string|max:50',
                'res_phone' => 'nullable|string|max:20',
                'dob' => 'nullable|date',
                'nationality' => 'nullable|string|max:100',
                'religion' => 'nullable|string|max:50',
                'marital_status' => 'nullable|in:Single,Married,Divorced,Widowed',
                'marriage_date' => 'nullable|date',
                'email' => 'nullable|email|max:255',
                'profession' => 'nullable|string|max:255',
                'designation' => 'nullable|string|max:255',
                'organization' => 'nullable|string|max:255',
                'gender' => 'nullable|in:Male,Female',
                'resident_status' => 'nullable|in:Resident,Non Resident',
                'applicant_photo' => 'nullable|image|max:2048',
                
                // Project
                'project_name' => 'nullable|string|max:255',
                
                // Nominee
                'nominee_name' => 'nullable|string|max:255',
                'nominee_relation' => 'nullable|string|max:100',
                'nominee_nid' => 'nullable|string|max:50',
                'nominee_mobile' => 'nullable|string|max:20',
                'nominee_address' => 'nullable|string',
                'nominee_photo' => 'nullable|image|max:2048',
                
                // Plot
                'plot_type' => 'nullable|in:Resident,Non Resident,Commercial',
                'plot_no' => 'nullable|string|max:50',
                'road_no' => 'nullable|string|max:50',
                'block_no' => 'nullable|string|max:50',
                'facing' => 'nullable|string|max:50',
                'rate_per_katha' => 'nullable|numeric|min:0',
                'area_katha' => 'nullable|numeric|min:0',
                'remarks' => 'nullable|string',
                'total_price' => 'nullable|numeric|min:0',
                
                // Payment
                'payment_mode' => 'nullable|in:Installment,At-a-Time',
                'booking_money' => 'nullable|numeric|min:0',
                'payment_type' => 'nullable|in:Cash,Cheque,Pay Order,Demand Draft',
                'cheque_no' => 'nullable|string|max:100',
                'cheque_date' => 'nullable|date',
                'bank_name' => 'nullable|string|max:255',
                'branch_name' => 'nullable|string|max:255',
                'down_payment' => 'nullable|numeric|min:0',
                'down_payment_percent' => 'nullable|numeric|min:0|max:100',
                'emi_start_date' => 'nullable|date',
                'remaining_amount' => 'nullable|numeric|min:0',
                'no_of_installment' => 'nullable|integer|min:1',
                'per_installment' => 'nullable|numeric|min:0',
                
                // Terms
                'agreed_to_terms' => 'required|accepted',
            ]);

            // Remove agreed_to_terms from validated data
            unset($validated['agreed_to_terms']);

            // Set application date
            $validated['application_date'] = now()->toDateString();
            $validated['status'] = 'pending';

            // Handle applicant photo upload
            if ($request->hasFile('applicant_photo')) {
                $validated['applicant_photo'] = $request->file('applicant_photo')
                    ->store('registrations/applicants', 'public');
            }

            // Handle nominee photo upload
            if ($request->hasFile('nominee_photo')) {
                $validated['nominee_photo'] = $request->file('nominee_photo')
                    ->store('registrations/nominees', 'public');
            }

            // Create registration
            $registration = PlotRegistration::create($validated);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'আবেদনটি সফলভাবে জমা হয়েছে!',
                    'application_number' => $registration->application_number,
                    'redirect' => route('registration.success', $registration->id)
                ]);
            }

            return redirect()->route('registration.success', $registration->id)
                ->with('success', 'আবেদনটি সফলভাবে জমা হয়েছে!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::info('Plot Registration Validation Errors:', $e->errors());
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors(),
                    'message' => 'অনুগ্রহ করে ফর্মের তথ্যগুলো যাচাই করুন।'
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            \Log::error('Plot Registration Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'আবেদনটি জমা দেওয়ার সময় একটি ভুল হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।'
                ], 500);
            }
            return back()->withInput()->with('error', 'আবেদনটি জমা দেওয়ার সময় একটি ভুল হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।');
        }
    }

    /**
     * Show registration success page.
     */
    public function success(PlotRegistration $registration)
    {
        $footerSettings = FooterSetting::first();
        $headerSettings = HeaderSetting::first();
        
        return view('pages.registration-success', compact('registration', 'footerSettings', 'headerSettings'));
    }

    /**
     * Check registration status (public).
     */
    public function checkStatus(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string',
        ]);

        $registrations = PlotRegistration::where('mobile', $request->mobile)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($registrations->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'কোনো আবেদন পাওয়া যায়নি।'
            ]);
        }

        return response()->json([
            'success' => true,
            'registrations' => $registrations->map(function ($reg) {
                return [
                    'application_number' => $reg->application_number,
                    'applicant_name' => $reg->applicant_name,
                    'project_name' => $reg->project_name,
                    'status' => $reg->status,
                    'status_bengali' => $reg->status_bengali,
                    'submitted_at' => $reg->created_at->format('d M Y'),
                ];
            })
        ]);
    }
}
