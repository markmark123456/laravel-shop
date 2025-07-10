<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word(); // случайное одно слово
        return [
            'name' => ucfirst($name),
            'code' => Str::slug($name) . '-' . $this->faker->unique()->randomNumber(2),
            'description' => $this->faker->sentence(),
            'image' => null, // если нужно — можешь позже добавить генерацию изображений
        ];
    }
}
