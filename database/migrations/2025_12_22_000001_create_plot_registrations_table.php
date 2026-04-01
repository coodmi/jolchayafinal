<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plot_registrations', function (Blueprint $table) {
            $table->id();
            
            // Office Use Section
            $table->string('sl_no')->nullable();
            $table->date('application_date')->nullable();
            $table->string('file_no')->nullable();
            $table->string('sr_code')->nullable();
            $table->string('team')->nullable();
            $table->string('rep')->nullable();
            
            // Project Info
            $table->string('project_name')->nullable();
            
            // Applicant Information
            $table->string('applicant_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->text('mailing_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('nid')->nullable();
            $table->string('mobile');
            $table->string('tin')->nullable();
            $table->string('res_phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->default('Bangladeshi');
            $table->string('religion')->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->default('Single');
            $table->date('marriage_date')->nullable();
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->enum('resident_status', ['Resident', 'Non Resident'])->default('Resident');
            $table->string('applicant_photo')->nullable();
            
            // Nominee Information
            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('nominee_nid')->nullable();
            $table->string('nominee_mobile')->nullable();
            $table->text('nominee_address')->nullable();
            $table->string('nominee_photo')->nullable();
            
            // Plot/Property Information
            $table->enum('plot_type', ['Resident', 'Non Resident', 'Commercial'])->default('Resident');
            $table->string('plot_no')->nullable();
            $table->string('road_no')->nullable();
            $table->string('block_no')->nullable();
            $table->string('facing')->nullable();
            $table->decimal('rate_per_katha', 15, 2)->nullable();
            $table->decimal('area_katha', 10, 4)->nullable();
            $table->text('remarks')->nullable();
            $table->decimal('total_price', 15, 2)->nullable();
            
            // Payment Information
            $table->enum('payment_mode', ['Installment', 'At-a-Time'])->default('Installment');
            $table->decimal('booking_money', 15, 2)->nullable();
            $table->enum('payment_type', ['Cash', 'Cheque', 'Pay Order', 'Demand Draft'])->default('Cash');
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->decimal('down_payment', 15, 2)->nullable();
            $table->decimal('down_payment_percent', 5, 2)->nullable();
            $table->date('emi_start_date')->nullable();
            $table->decimal('remaining_amount', 15, 2)->nullable();
            $table->integer('no_of_installment')->nullable();
            $table->decimal('per_installment', 15, 2)->nullable();
            
            // Status Management
            $table->enum('status', ['pending', 'approved', 'rejected', 'processing'])->default('pending');
            $table->text('admin_notes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plot_registrations');
    }
};
