<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEarningsThisMonth = Order::whereMonth('created_at', date('m'))->sum('total_price_per_order');
        $totalSpendThisMonth = Purchase::whereMonth('created_at', date('m'))->sum('total_price_per_purchase');

        return view('dashboard', [
            'totalCustomers' => Customer::count(),
            'totalCustomersThisMonth' => Customer::whereMonth('created_at', date('m'))->count(),
            'totalOrderCompletedThisMonth' => OrderDetails::whereMonth('created_at', date('m'))->sum('quantity'),
            'totalEarningsThisMonth' => $totalEarningsThisMonth,
            'totalItemPurchasedThisMonth' => PurchaseDetails::whereMonth('created_at', date('m'))->sum('quantity'),
            'totalSpendThisMonth' => $totalSpendThisMonth,
            'profitOrLoss' => $totalEarningsThisMonth - $totalSpendThisMonth,

            'orderLists' => OrderDetails::with('product')->selectRaw('
                sum(quantity) as quantity, product_id,
                sum(total_price_per_product) as total_price_per_product
            ')
                ->groupBy('product_id')->whereMonth('created_at', '=', date('m'))
                ->paginate(10),

            'topSellingProducts' => OrderDetails::with('product')->groupBy('product_id')
                ->select('product_id')
                ->orderByRaw('SUM(quantity) DESC')
                ->limit(10)
                ->get()

        ]);
    }
}
