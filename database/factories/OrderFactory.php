<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'order_no' => rand(1, 1000),
            'customer_id' => rand(1, 1000),
            'total_price_per_order' => rand(1, 1000),

            'address' => $this->faker->streetAddress(),
            'receiver_mobile' => "01" . rand(111111111, 999999999),
            'delivery_date' => $this->faker->dateTimeThisCentury('+8 years'),
        ];
    }
}
