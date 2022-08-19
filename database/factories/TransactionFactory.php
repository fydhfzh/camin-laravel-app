<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'total_price' => $this->faker->randomNumber(7),
            'user_id' => $this->faker->numberBetween(1, User::all()->count()),
        ];
    }
}
