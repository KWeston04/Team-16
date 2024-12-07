<?php

use Illuminate\Support\Facades\Route;

Route::get('/api/sales-data', function () {
    return response()->json([
        ['month' => 'January', 'sales' => 180],
        ['month' => 'February', 'sales' => 220],
        ['month' => 'March', 'sales' => 250],
        ['month' => 'April', 'sales' => 320],
        ['month' => 'May', 'sales' => 400]
    ]);
});

