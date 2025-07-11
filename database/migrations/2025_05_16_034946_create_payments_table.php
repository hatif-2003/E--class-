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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable(); // agar user login hota hai
            $table->foreignId('course_id')->constrained()->nullable(); // agar course enroll ho raha hai
            $table->string('razorpay_payment_id')->unique();
            $table->string('amount');
            $table->string('currency')->default('INR');
            $table->string('status')->default('captured'); // ya 'failed'
            $table->text('payment_method')->nullable(); // card/upi/netbanking
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
