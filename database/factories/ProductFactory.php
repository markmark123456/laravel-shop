<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true); // два случайных слова

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(), // или новая категория
            'name' => ucfirst($name),
            'code' => Str::slug($name) . '-' . $this->faker->unique()->randomNumber(3),
            'description' => $this->faker->paragraph(),
            'image' => null,
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'in_stock' => $this->faker->boolean(80), // 80% вероятность "в наличии"
        ];
    }
}
