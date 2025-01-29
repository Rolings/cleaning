<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => 'Service name #' . $this->faker->unique()->numberBetween(),
            'slug'        => $this->faker->unique()->slug,
            'price'       => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->text,
        ];
    }
}
