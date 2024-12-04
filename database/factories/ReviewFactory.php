<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'    => $this->faker->name(),
            'email'   => $this->faker->unique()->safeEmail(),
            'comment' => $this->faker->text(400),
            'rating'  => rand(1, 5),
            'active'  => rand(0, 1),
        ];
    }
}
