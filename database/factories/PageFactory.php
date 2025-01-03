<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->slug(),
            'slug'        => $this->faker->unique()->slug(),
            'description' => $this->faker->text(),
            'keywords'    => $this->faker->text(),
            'robot_index' => $this->faker->boolean(),
        ];
    }
}
