<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_finder_sms_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_finder_request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('users')->cascadeOnDelete();
            $table->string('phone', 50);
            $table->text('message');
            $table->string('status', 20)->default('sent');
            $table->timestamp('sent_at')->nullable();
            $table->text('provider_response')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_finder_sms_leads');
    }
};
