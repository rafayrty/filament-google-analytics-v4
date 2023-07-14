<?php

namespace RafayRty\FilamentGoogleAnalyticsV4\Widgets;

use RafayRty\FilamentGoogleAnalyticsV4\FilamentGoogleAnalytics;
use RafayRty\FilamentGoogleAnalyticsV4\Traits;
use Filament\Widgets\Widget;
use Illuminate\Support\Arr;

class PageViewsWidget extends Widget
{
    use Traits\PageViews;
    use Traits\CanViewWidget;

    protected static string $view = 'filament-google-analytics::widgets.page-views-widget';

    protected static ?int $sort = 3;

    public ?string $filter = 'T';

    public $readyToLoad = false;

    public function init()
    {
        $this->readyToLoad = true;
    }

    public function label(): ?string
    {
        return __('filament-google-analytics::widgets.page_views');
    }

    protected static function filters(): array
    {
        return [
            'T' => __('filament-google-analytics::widgets.T'),
            'Y' => __('filament-google-analytics::widgets.Y'),
            'LW' => __('filament-google-analytics::widgets.LW'),
            'LM' => __('filament-google-analytics::widgets.LM'),
            'LSD' => __('filament-google-analytics::widgets.LSD'),
            'LTD' => __('filament-google-analytics::widgets.LTD'),
        ];
    }

    protected function initializeData()
    {
        $lookups = [
            'T' => $this->pageViewsToday(),
            'Y' => $this->pageViewsYesterday(),
            'LW' => $this->pageViewsLastWeek(),
            'LM' => $this->pageViewsLastMonth(),
            'LSD' => $this->pageViewsLastSevenDays(),
            'LTD' => $this->pageViewsLastThirtyDays(),
        ];

        $data = Arr::get(
            $lookups,
            $this->filter,
            [
                'result' => 0,
                'previous' => 0,
            ],
        );

        return FilamentGoogleAnalytics::for($data['result'])
            ->previous($data['previous'])
            ->format('%');
    }

    protected function getData(): array
    {
        return [
            'value' => $this->initializeData()->trajectoryValue(),
            'icon' => $this->initializeData()->trajectoryIcon(),
            'color' => $this->initializeData()->trajectoryColor(),
            'description' => $this->initializeData()->trajectoryDescription(),
            'chart' => [],
            'chartColor' => '',
        ];
    }

    protected function getViewData(): array
    {
        return [
            'data' => $this->readyToLoad ? $this->getData() : [],
            'filters' => static::filters(),
        ];
    }
}
