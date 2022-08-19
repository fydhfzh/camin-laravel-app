<?php

namespace Database\Factories;

use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = CartProduct::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(1,100),
            'total_price' => $this->faker->randomNumber(5, false),
            'product_id' => $this->faker->numberBetween(1, Product::all()->count()),
            'user_id' => $this->faker->numberBetween(1, User::all()->count())
        ];
    }
}
