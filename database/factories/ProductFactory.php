<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Subcategory;

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
        return [
            'productname' => $this->faker->words(2, true),
            'image' => $this->faker->imageUrl(300, 300, 'pets', true),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'stockquantity' => $this->faker->numberBetween(10, 200),
            'category_id' => Category::factory(),
            'subcategory_id' => SubCategory::factory(),
        ];
    }
}
