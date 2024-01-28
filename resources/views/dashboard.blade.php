@extends('layouts.master')
@section('main-body')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h3 class="title-1">overview({{ date('M Y') }})</h3>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon w-100">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                        <div class="text">
                            <h3>Total : {{ $totalCustomers ?? 0 }}</h3>
                            <span>Registered Customers</span>
                        </div>
                        <div class="text py-2">
                            <h3>new: {{ $totalCustomersThisMonth ?? 0 }}</h3>
                            <span>Customers Joined this month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon w-100">
                            <h1 class="h1 text-white">৳</h1>
                        </div>
                        <div class="text">
                            <div>
                                <h3>Total: {{ $totalOrderCompletedThisMonth ?? 0 }}</h3>
                                <span> items Sold</span>
                            </div>
                            <div class="py-2">
                                <h3>Total: {{ $totalEarningsThisMonth ?? 0 }} ৳</h3>
                                <span>earnings this month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon w-100">
                            <i class="fa fa-archive"></i>
                        </div>
                        <div class="text">
                            <h3>Total: {{ $totalItemPurchasedThisMonth ?? 0 }}</h3>
                            <span>items Purchased</span>
                        </div>
                        <div class="text py-2">
                            <h3>Total: {{ $totalSpendThisMonth ?? 0 }} ৳</h3>
                            <span>Spending this month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon w-100">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                        <div class="text py-2">
                            <h3>
                                @if ($profitOrLoss == 0)
                                    N/A
                                @elseif ($profitOrLoss < 0)
                                    Loss
                                @else
                                    Profit
                                @endif
                            </h3>

                            <span>
                                @if ($profitOrLoss > 0)
                                    Conngrats! this month Your profit
                                @else
                                    &nbsp;
                                @endif
                            </span>

                            <h3>Amount: {{ $profitOrLoss ?? 'N/A' }} ৳</h3>
                            <span>&nbsp;</span>
                            <span>&nbsp;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-9">
            <h3 class="title-1 m-b-25">Earnings By Items</h3>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th class="text-right">price</th>
                            <th class="text-right">quantity</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderLists as $orderItem)
                            <tr>
                                <td scope="row">
                                    {{ ($orderLists->currentPage() - 1) * $orderLists->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ $orderItem->product->name ?? '' }}</td>
                                <td class="text-right">{{ $orderItem->product->selling_price ?? 0 }}</td>
                                <td class="text-right">{{ $orderItem->quantity ?? 0 }}</td>
                                <td class="text-right">{{ $orderItem->total_price_per_product ?? 0 }}</td </tr>
                        @endforeach
                    </tbody>
                </table>
                <table style="float: right;">
                    <tbody>
                        <tr>
                        <tr>
                            <td class="pagination" colspan="5">
                                {{ $orderLists->onEachSide(2)->links() }}
                            </td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
            <h3 class="title-1 m-b-25">Top 10 Products</h3>
            <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                <div class="au-card-inner">
                    <div class="table-responsive">
                        <table class="table table-top-countries">
                            <thead>
                                <tr>
                                    <th class="text-white">id</th>
                                    <th class="text-white">name</th>
                                    <th class="text-white text-right">price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topSellingProducts as $topSellingProduct)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $topSellingProduct->product->name ?? '' }}</td>
                                        <td class="text-right">
                                            {{ $topSellingProduct->product->selling_price ?? 0 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
