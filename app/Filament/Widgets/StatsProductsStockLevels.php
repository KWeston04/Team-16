<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsProductsStockLevels extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        // Retrieve counts for each stock status
        $inStockCount = Product::where('stock_status', 'in_stock')->count();
        $outOfStockCount = Product::where('stock_status', 'out_of_stock')->count();
        $preOrderCount = Product::where('stock_status', 'pre_order')->count();

        return [
            Stat::make('In Stock', $inStockCount)
                ->id('in_stock')
                ->description('Total products in stock')
                ->color('success'),
            Stat::make('Out of Stock', $outOfStockCount)
                ->id('out_of_stock')
                ->description('Total products out of stock')
                ->color('danger'),
            Stat::make('Pre-order', $preOrderCount)
                ->id('pre_order')
                ->description('Total products available for pre-order')
                ->color('warning'),
        ];
    }
}
