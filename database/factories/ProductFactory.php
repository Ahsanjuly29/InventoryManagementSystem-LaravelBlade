<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->name();

        try {
            return [
                'name' => $name,
                'slug' => str_replace('.','', str_replace(' ','', strtolower($name))),
                'selling_price' => rand(150, 1500),
                'total_quantity_total_stock' => rand(100, 1000)
            ];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
