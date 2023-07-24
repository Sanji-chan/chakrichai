<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();  //application id
            $table->unsignedBigInteger('user_id'); // applicant id
            $table->unsignedBigInteger('post_id');    //post id
            $table->string('name'); 
            $table->string('Uni_name')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('age')->nullable();
            $table->string('slug')->unique();
            $table->string('major')->nullable();
            // $table->decimal('price', 8, 2)->nullable();
            $table->string('status')->default('pending');
            $table->string('resume')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
