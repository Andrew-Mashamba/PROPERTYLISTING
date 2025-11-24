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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 50)->unique();
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('users')->onDelete('cascade');
            $table->decimal('total_amount', 15, 2);
            $table->enum('status', ['pending', 'confirmed', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->text('shipping_address');
            $table->text('billing_address');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index(['buyer_id', 'status']);
            $table->index(['supplier_id', 'status']);
            $table->index(['status', 'payment_status']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
