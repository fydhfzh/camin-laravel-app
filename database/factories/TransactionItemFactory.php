<?php

namespace Database\Factories;

use App\Models\TransactionItem;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TransactionItem::class;

    public function definition()
    {
        return [
            'transaction_id' => $this->faker->numberBetween(1, Transaction::all()->count()),
            'product_id' => $this->faker->numberBetween(1, Product::all()->count()),
            'amount' => $this->faker->numberBetween(1, 10)
        ];
    }
}
