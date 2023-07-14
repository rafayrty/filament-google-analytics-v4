<?php

namespace RafayRty\FilamentGoogleAnalyticsV4;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentGoogleAnalyticsServiceV4Provider extends PluginServiceProvider
{
    protected array $pages = [
        Pages\FilamentGoogleAnalyticsV4Dashboard::class,
    ];

    protected array $widgets = [
        Widgets\PageViewsWidget::class,
        Widgets\VisitorsWidget::class,
        Widgets\ActiveUsersOneDayWidget::class,
        Widgets\ActiveUsersSevenDayWidget::class,
        Widgets\ActiveUsersTwentyEightDayWidget::class,
        Widgets\SessionsWidget::class,
        Widgets\SessionsDurationWidget::class,
        Widgets\SessionsByCountryWidget::class,
        Widgets\SessionsByDeviceWidget::class,
        Widgets\MostVisitedPagesWidget::class,
        Widgets\TopReferrersListWidget::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-google-analytics-v4')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations();
    }
}
