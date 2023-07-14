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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // Add other profile fields as needed
            $table->string('position')->nullable();
            $table->string('education')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('dob')->nullable();

            $table->string('bio')->nullable();
            $table->string('facebooklink')->nullable();
            $table->string('githublink')->nullable();
            $table->string('instagramlink')->nullable();
            $table->string('linkedinlink')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
