<?php

namespace App\Filament\Widgets;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Helper function to format numbers
        $formatNumber = function (int $number): string {
            if ($number < 1000) {
                return (string) Number::format($number, 0);
            }

            if ($number < 1000000) {
                return Number::format($number / 1000, 2).'k';
            }

            return Number::format($number / 1000000, 2).'m';
        };

        $formatPercantageNumber = function ($number) {
            return number_format($number, 2).'%';
        };

        // Retrieve current values
        $currentRevenue = OrderItem::whereDate('created_at', '>=', Carbon::now()->startOfMonth())->sum('price_at_purchase');
        $currentCustomers = User::where('user_type', 'customer')->whereDate('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $currentOrders = Order::whereDate('created_at', '>=', Carbon::now()->startOfMonth())->count();

        // Retrieve previous period values (e.g., previous month)
        $previousRevenue = OrderItem::whereDate('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->whereDate('created_at', '<', Carbon::now()->startOfMonth())
            ->sum('price_at_purchase');
        $previousCustomers = User::where('user_type', 'customer')->whereDate('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->whereDate('created_at', '<', Carbon::now()->startOfMonth())
            ->count();
        $previousOrders = Order::whereDate('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->whereDate('created_at', '<', Carbon::now()->startOfMonth())
            ->count();

        // Calculate percentage changes
        $revenueChange = $previousRevenue ? (($currentRevenue - $previousRevenue) / $previousRevenue) * 100 : 0;
        $customersChange = $previousCustomers ? (($currentCustomers - $previousCustomers) / $previousCustomers) * 100 : 0;
        $ordersChange = $previousOrders ? (($currentOrders - $previousOrders) / $previousOrders) * 100 : 0;

        // Determine descriptions and colors based on changes
        $revenueDescription = $revenueChange >= 0 ? $formatPercantageNumber(abs($revenueChange)).' '.'increase' : $formatPercantageNumber(abs($revenueChange)).' '.'decrease';
        $revenueColor = $revenueChange >= 0 ? 'success' : 'danger';
        $revenueIcon = $revenueChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';

        $customersDescription = $customersChange >= 0 ? $formatPercantageNumber(abs($customersChange)).' '.'increase' : $formatPercantageNumber(abs($customersChange)).' '.'decrease';
        $customersColor = $customersChange >= 0 ? 'success' : 'danger';
        $customersIcon = $customersChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';

        $ordersDescription = $ordersChange >= 0 ? $formatPercantageNumber(abs($ordersChange)).' '.'increase' : $formatPercantageNumber(abs($ordersChange)).' '.'decrease';
        $ordersColor = $ordersChange >= 0 ? 'success' : 'danger';
        $ordersIcon = $ordersChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';

        return [
            Stat::make('New revenues', $formatNumber($currentRevenue).' '.'$')
                ->id('new_revenues')
                ->description($revenueDescription)
                ->descriptionIcon($revenueIcon)
                ->chart([15, 4, 10, 2, 12, 4, 1])
                ->color($revenueColor)
                ->chartColor($revenueColor),
            Stat::make('New customers', $formatNumber($currentCustomers))
                ->id('new_customers')
                ->description($customersDescription)
                ->descriptionIcon($customersIcon)
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color($customersColor)
                ->chartColor($customersColor),
            Stat::make('New orders', $formatNumber($currentOrders))
                ->id('new_orders')
                ->description($ordersDescription)
                ->descriptionIcon($ordersIcon)
                ->color($ordersColor)
                ->chart([15, 5, 4, 1])
                ->chartColor($ordersColor),
        ];
    }
}
