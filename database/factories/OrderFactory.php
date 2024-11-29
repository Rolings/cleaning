<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OrderFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone'      => fake()->unique()->phoneNumber(),
            'email'      => fake()->unique()->email(),
            'address'    => fake()->address(),
            'order_at'   => fake()->dateTimeBetween(now()->subDays(365), now()),
            'comment'    => fake()->text(),
            'created_at' => fake()->dateTimeBetween(now()->subDays(365), now())
        ];
    }
}