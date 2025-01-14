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
            'token'      => Hash::make(Str::random(10) . now()->format('YmdHis')),
            'state_id'   => fake()->numberBetween(1, 50),
            'first_name' => fake()->firstName(),
            'last_name'  => fake()->firstName(),
            'phone'      => fake()->unique()->phoneNumber(),
            'email'      => fake()->unique()->email(),
            'address'    => fake()->address(),
            'order_at'   => fake()->dateTimeBetween(now()->subDays(365), now()),
            'comment'    => fake()->text(),
            'created_at' => fake()->dateTimeBetween(now()->subDays(365), now()),
            'is_read'    => rand(0, 1) == 1,
        ];
    }
}
