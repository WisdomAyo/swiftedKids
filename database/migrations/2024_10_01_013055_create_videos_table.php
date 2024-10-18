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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->contrained('users')->onDelete('cascade');
            $table->enum('video_type', ['youtube', 'uploaded'])->default('youtube'); // Type of video: YouTube or uploaded
            $table->string('youtube_link')->nullable(); // YouTube link, if applicable
            $table->string('uploaded_video_path')->nullable(); // Uploaded video file path, if applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
