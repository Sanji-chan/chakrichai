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
        Schema::table('user_profiles', function ($table) {
            $table->double('avg_rating')->default(0);
            $table->unsignedBigInteger('total_raters')->default(0);
        });

        Schema::table('posts', function ($table) {
            $table->tinyInteger('buyer_rating')->default(0);
            $table->tinyInteger('seller_rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_profiles', function ($table) {
            $table->dropColumn('avg_rating');
            $table->dropColumn('total_raters');
        });

        Schema::table('posts', function ($table) {
            $table->dropColumn('buyer_rating');
            $table->dropColumn('seller_rating');
        });
    }
};
