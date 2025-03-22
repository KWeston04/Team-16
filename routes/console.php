<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('queue:work --max-time=60 --queue=default --sleep=2 --tries=3 --timeout=5')->everyMinute()->appendOutputTo(storage_path().'/logs/scheduler.log');
Schedule::command('auth:clear-resets')->everyFifteenMinutes();