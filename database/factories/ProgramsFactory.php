<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programs>
 */
class ProgramsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'program_name' => $this->faker->words(3, true),
            'program_description' => $this->faker->sentence(),
            'program_status' => $this->faker->boolean(80),
            'program_date' => $this->faker->date()
        ];
    }
}