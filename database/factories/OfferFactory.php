<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => 'Offer name #' . $this->faker->unique()->numberBetween(),
            'slug'        => $this->faker->unique()->slug,
            'description' => $this->faker->text,
        ];
    }
}
