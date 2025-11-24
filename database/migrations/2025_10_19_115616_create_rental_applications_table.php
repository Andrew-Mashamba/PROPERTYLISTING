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
        Schema::create('rental_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('email');
            $table->string('phone');
            $table->decimal('monthly_income', 15, 2);
            $table->string('employment_status');
            $table->string('employer');
            $table->integer('credit_score')->nullable();
            $table->integer('references')->default(0);
            $table->date('desired_move_in');
            $table->text('message')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_applications');
    }
};
