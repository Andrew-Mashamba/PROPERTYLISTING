<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('to_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('property_id')->nullable()->constrained('properties')->onDelete('cascade');
            $table->string('subject');
            $table->text('message');
            $table->string('status')->default('new'); // new, read, replied, closed
            $table->string('priority')->default('normal'); // low, normal, high, urgent
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamp('replied_at')->nullable();
            $table->timestamps();
            
            $table->index(['to_user_id', 'status']);
            $table->index(['property_id']);
            $table->index(['created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
