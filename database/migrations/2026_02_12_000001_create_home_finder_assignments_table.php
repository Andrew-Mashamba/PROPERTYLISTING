<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_finder_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_finder_request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assigned_by')->constrained('users')->cascadeOnDelete();
            $table->string('status', 30)->default('reviewed');
            $table->text('review_notes')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            $table->unique(['home_finder_request_id', 'agent_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_finder_assignments');
    }
};
