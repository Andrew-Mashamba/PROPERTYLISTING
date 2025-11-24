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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('material_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('from_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('to_user_id')->constrained('users')->onDelete('cascade');
            $table->string('subject');
            $table->text('message');
            $table->enum('inquiry_type', ['property', 'material', 'general']);
            $table->enum('status', ['new', 'read', 'replied', 'closed'])->default('new');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->timestamps();
            
            // Indexes
            $table->index(['from_user_id', 'status']);
            $table->index(['to_user_id', 'status']);
            $table->index(['inquiry_type', 'status']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
