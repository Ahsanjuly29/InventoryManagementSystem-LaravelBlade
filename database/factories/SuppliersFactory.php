<?php

namespace Database\Factories;

use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suppliers>
 */
class SuppliersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Suppliers::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => "01" . rand(111111111, 999999999),
        ];
    }
}
