<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->randomHtml(2,3),
            'is_favorite' => fake()->boolean(),
            'language' => fake()->word(),
            'description' => fake()->sentence(6),
            'proyect_id' => fake()->numberBetween(1, 5),
        ];
    }
}
