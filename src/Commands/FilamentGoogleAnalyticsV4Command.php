<?php

namespace RafayRty\FilamentGoogleAnalyticsV4\Commands;

use Illuminate\Console\Command;

class FilamentGoogleAnalyticsV4Command extends Command
{
    public $signature = 'filament-google-analytics-v4';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
