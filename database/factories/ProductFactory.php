<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;
    
    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'image' => Str::random(),
            'category_id' => $this->faker->numberBetween(1, Category::all()->count()),
            'product_description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(1, 100),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'product_sold' => $this->faker->numberBetween(1, 100),
        ];
    }
}
