<?php

namespace RafayRty\FilamentGoogleAnalyticsV4\Pages;

use RafayRty\FilamentGoogleAnalyticsV4\Widgets;
use Filament\Pages\Page;

class FilamentGoogleAnalyticsV4Dashboard extends Page
{
    protected static string $view = 'filament-google-analytics::pages.google-analytics-dashboard';

    public function mount()
    {
        if (! static::canView()) {
            return redirect(config('filament.path'));
        }
    }

    protected static function getNavigationIcon(): string
    {
        return config('filament-google-analytics.dashboard_icon') ?? 'heroicon-o-chart-bar';
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament-google-analytics::widgets.navigation_label');
    }

    protected function getTitle(): string
    {
        return __('filament-google-analytics::widgets.title');
    }

    public static function canView(): bool
    {
        return config('filament-google-analytics.dedicated_dashboard');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return static::canView() && static::$shouldRegisterNavigation;
    }

    protected function getHeaderWidgets(): array
    {
        return [
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
    }
}
