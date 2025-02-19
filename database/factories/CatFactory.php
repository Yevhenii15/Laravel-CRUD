<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->firstName, 
            'age' => $this->faker->numberBetween(1, 20),
        ];
    }
    
}
