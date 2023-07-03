<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserWebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_ids = User::select('id')->get();
        $website_ids = Website::select('id')->get();

        return [
            'user_id' => fake()->randomElement($user_ids),
            'website_id' => fake()->randomElement($website_ids),
        ];
    }
}
