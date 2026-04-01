<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFormField;
use Illuminate\Http\Request;

class ContactFormFieldController extends Controller
{
    public function index()
    {
        $fields = ContactFormField::where('is_active', true)
            ->orderBy('order')
            ->orderBy('created_at')
            ->get();
        
        return response()->json($fields);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'type' => 'required|string|in:text,email,tel,textarea,number',
            'placeholder' => 'nullable|string|max:255',
            'required' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $field = ContactFormField::create([
            'label' => $validated['label'],
            'type' => $validated['type'],
            'placeholder' => $validated['placeholder'] ?? '',
            'required' => $validated['required'] ?? false,
            'order' => $validated['order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'ফিল্ড সফলভাবে যোগ করা হয়েছে',
            'field' => $field
        ]);
    }

    public function update(Request $request, $id)
    {
        $field = ContactFormField::findOrFail($id);

        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'type' => 'required|string|in:text,email,tel,textarea,number',
            'placeholder' => 'nullable|string|max:255',
            'required' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $field->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'ফিল্ড সফলভাবে আপডেট করা হয়েছে',
            'field' => $field
        ]);
    }

    public function destroy($id)
    {
        $field = ContactFormField::findOrFail($id);
        $field->delete();

        return response()->json([
            'success' => true,
            'message' => 'ফিল্ড সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
    
    public function getSubmitButton()
    {
        $settings = \App\Models\ContactSetting::first();
        return response()->json([
            'buttonText' => $settings->submit_button_text ?? 'পাঠান'
        ]);
    }

    public function updateSubmitButton(Request $request)
    {
        $validated = $request->validate([
            'buttonText' => 'required|string|max:255',
        ]);

        $settings = \App\Models\ContactSetting::firstOrCreate([]);
        $settings->update(['submit_button_text' => $validated['buttonText']]);

        return response()->json([
            'success' => true,
            'message' => 'বাটন টেক্সট আপডেট করা হয়েছে'
        ]);
    }
}
