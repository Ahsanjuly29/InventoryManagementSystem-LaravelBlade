<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Suppliers;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Suppliers::factory()->count(1000)->create();
        Customer::factory()->count(1000)->create();
        Product::factory()->count(1000)->create();
        Purchase::factory()->count(1000)->create();
        PurchaseDetails::factory()->count(1000)->create();
        Order::factory()->count(1000)->create();
        OrderDetails::factory()->count(1000)->create();
        User::factory(10)->create();
    }
}
