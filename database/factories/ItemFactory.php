<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::slug($this->faker->sentence(2)),
            'name' => $this->faker->word(),
            'is_active' => $this->faker->boolean(85),
            'value' => $this->faker->randomNumber(5, false)
        ];
    }
}
