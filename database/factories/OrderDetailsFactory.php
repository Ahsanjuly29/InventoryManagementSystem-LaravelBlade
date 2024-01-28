<?php

namespace Database\Factories;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = OrderDetails::class;
    public function definition(): array
    {
        $sellingPricePerProduct = rand(150, 1500);

        return [
            'order_id' => rand(1, 1000),
            'product_id' => rand(1, 1000),
            'quantity' => 1,
            'selling_price_per_product' => $sellingPricePerProduct,
            'total_price_per_product' => $sellingPricePerProduct,
        ];
    }
}
