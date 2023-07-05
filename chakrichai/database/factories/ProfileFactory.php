<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;
use App\Models\User;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        $factory->define(UserProfile::class, function (Faker $faker) {
            return [
                'user_id' => function () {
                    return factory(App\Models\User::class)->create()->id;
                },
                'bio' => $faker->sentence,
                // Add other attributes and their values here
            ];
        });
    }
}
