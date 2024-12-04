<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'email'    => fake()->email(),
            'subject'  => fake()->word(),
            'question' => fake()->sentence(),
            'answer'   => fake()->word(),
            'top'      => rand(0, 1) == 1,
            'active'   => rand(0, 1) == 1,
        ];
    }
}
