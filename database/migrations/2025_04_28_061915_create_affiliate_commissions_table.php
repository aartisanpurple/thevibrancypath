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
        Schema::create('affiliate_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->constrained('affiliates')->onDelete('cascade'); // Refers to affiliate
            $table->foreignId('referred_user_id')->constrained('users')->onDelete('cascade'); // New user who registered via referral
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Order placed by referred user
            $table->decimal('amount', 10, 2); // Commission amount
            $table->boolean('paid')->default(false); // Whether commission is paid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_commissions');
    }
};
