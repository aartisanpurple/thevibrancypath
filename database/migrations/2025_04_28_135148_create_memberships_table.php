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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // 'basic' or 'premium'
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('amount', 8, 2); // e.g. 999999.99 max
            $table->string('payment_status'); // e.g. 'paid', 'unpaid', 'pending'
            $table->string('payment_id')->nullable(); // External payment reference ID
            $table->timestamp('payment_time')->nullable(); // Time when payment was made
            $table->text('remarks')->nullable(); // Optional field
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
