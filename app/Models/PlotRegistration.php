<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        // Office Use
        'sl_no',
        'application_date',
        'file_no',
        'sr_code',
        'team',
        'rep',
        
        // Project
        'project_name',
        
        // Applicant
        'applicant_name',
        'father_name',
        'mother_name',
        'spouse_name',
        'mailing_address',
        'permanent_address',
        'nid',
        'mobile',
        'tin',
        'res_phone',
        'dob',
        'nationality',
        'religion',
        'marital_status',
        'marriage_date',
        'email',
        'profession',
        'designation',
        'organization',
        'gender',
        'resident_status',
        'applicant_photo',
        
        // Nominee
        'nominee_name',
        'nominee_relation',
        'nominee_nid',
        'nominee_mobile',
        'nominee_address',
        'nominee_photo',
        
        // Plot
        'plot_type',
        'plot_no',
        'road_no',
        'block_no',
        'facing',
        'rate_per_katha',
        'area_katha',
        'remarks',
        'total_price',
        
        // Payment
        'payment_mode',
        'booking_money',
        'payment_type',
        'cheque_no',
        'cheque_date',
        'bank_name',
        'branch_name',
        'down_payment',
        'down_payment_percent',
        'emi_start_date',
        'remaining_amount',
        'no_of_installment',
        'per_installment',
        
        // Status
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'application_date' => 'date',
        'dob' => 'date',
        'marriage_date' => 'date',
        'cheque_date' => 'date',
        'emi_start_date' => 'date',
        'rate_per_katha' => 'decimal:2',
        'area_katha' => 'decimal:4',
        'total_price' => 'decimal:2',
        'booking_money' => 'decimal:2',
        'down_payment' => 'decimal:2',
        'down_payment_percent' => 'decimal:2',
        'remaining_amount' => 'decimal:2',
        'per_installment' => 'decimal:2',
    ];

    /**
     * Get formatted application number
     */
    public function getApplicationNumberAttribute(): string
    {
        return 'NEX-' . str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'approved' => 'success',
            'rejected' => 'danger',
            'processing' => 'warning',
            default => 'secondary',
        };
    }

    /**
     * Get status in Bengali
     */
    public function getStatusBengaliAttribute(): string
    {
        return match($this->status) {
            'pending' => 'অপেক্ষমাণ',
            'approved' => 'অনুমোদিত',
            'rejected' => 'বাতিল',
            'processing' => 'প্রক্রিয়াধীন',
            default => 'অজানা',
        };
    }

    /**
     * Scope for pending registrations
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for approved registrations
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
