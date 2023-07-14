<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProfileSeeder extends Seeder
{

    public function run()
    {
        Schema::disableForeignKeyConstraints(); // Disable foreign key constraints for truncation
        UserProfile::truncate(); // Optional: Truncate the table before seeding
        Schema::enableForeignKeyConstraints(); // Enable foreign key constraints after truncation

        $userIds = User::pluck('id')->all();

        // Generate and insert sample user profiles
        foreach ($userIds as $userId) {
            UserProfile::create([
                'user_id' => $userId,
                'bio' => 'Sample bio for User ' . $userId,
                // Add other attributes and their values here
            ]);
        }
    }
}
