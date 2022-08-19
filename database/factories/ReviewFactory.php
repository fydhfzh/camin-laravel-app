<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Review::class;

    public function definition()
    {
        return [
            'review_detail' => $this->faker->paragraph(2),
            'image' => Str::random(20),
            'product_id' => $this->faker->numberBetween(1, Product::all()->count()),
            'user_id' => $this->faker->numberBetween(1, User::all()->count())
        ];
    }
}
