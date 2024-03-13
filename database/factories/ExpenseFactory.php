<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('01-01-2024', now())->format('Y-m-d'),
            'concept' => $this->faker->realText(65),
            'amount' => $this->faker->numberBetween(15000, 100000000),
        ];
    }
}
