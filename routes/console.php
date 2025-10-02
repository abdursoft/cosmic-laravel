<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('app:publish-handler')->everyMinute();
Schedule::command('app:archive-handler')->dailyAt('01:00');
Schedule::command('app:subscription-handler')->dailyAt('01:00');

Schedule::command('app:test-comannd')->everyThirtySeconds();
