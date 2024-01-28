<?php

namespace Database\Factories;

use App\Models\PurchaseDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseDetails>
 */
class PurchaseDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     protected $model = PurchaseDetails::class;

    public function definition(): array
    {
        $purchasingPricePerProduct = rand(150, 1500);

        return [
            'purchase_id' => rand(1, 1000),
            'product_id' => rand(1, 1000),
            'quantity' => 1,
            'purchasing_price_per_product' => $purchasingPricePerProduct,
            'total_price_per_product' => $purchasingPricePerProduct
        ];
    }
}
