<?php

namespace Database\Factories;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Purchase::class;

    public function definition(): array
    {
        return [
            'supplier_id' => rand(1, 1000),
            'purchase_no' => rand(1, 1000),
            'total_price_per_purchase' => rand(1, 100),
            'received_date' => $this->faker->dateTimeThisCentury('+1 years'),
        ];
    }
}
