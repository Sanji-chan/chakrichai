<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tag')->nullable();
            $table->string('details')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('status')->default('active');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->date('end_date');
            // $table->unsignedBigInteger('hired_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}