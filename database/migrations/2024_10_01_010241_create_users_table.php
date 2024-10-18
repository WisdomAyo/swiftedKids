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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // User name (can be split into first_name and last_name if needed)
            $table->string('email')->unique(); // User email
            $table->timestamp('email_verified_at'); // Email verification timestamp
            $table->string('password'); // User password
            $table->enum('role', ['student', 'teacher', 'admin'])->default('student'); // Role (default is student)
            $table->string('phone_number')->nullable()->change();
            $table->string('bio')->nullable();;
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender (male, female, other)
            $table->string('language')->nullable(); // Preferred language (e.g., English, Spanish)
            $table->string('nin')->nullable(); // National Identification Number (NIN)
            $table->string('national_id_document')->nullable(); // National Identification Document (PDF/Image path)
            $table->string('dob')->nullable();
            $table->string('profile_image')->nullable(); // Optional profile image
            $table->string('location')->nullable();
            $table->boolean('approved')->default(false); // Whether the user is approved
            $table->boolean('banned')->default(false);   // Whether the user is banned
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
