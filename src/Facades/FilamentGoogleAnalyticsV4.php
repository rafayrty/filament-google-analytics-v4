<?php

namespace RafayRty\FilamentGoogleAnalyticsV4\Facades;

use RafayRty\FilamentGoogleAnalyticsV4\FilamentGoogleAnalyticsV4 as FGA;
use Illuminate\Support\Facades\Facade;

/**
 * @method static thousandsFormater()
 *
 * @see \BezhanSalleh\FilamentGoogleAnalytics\FilamentGoogleAnalytics
 */
class FilamentGoogleAnalytics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FGA::class;
    }
}
