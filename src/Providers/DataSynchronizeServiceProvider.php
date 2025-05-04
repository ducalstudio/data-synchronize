<?php

namespace Ducal\DataSynchronize\Providers;

use Ducal\Base\Supports\ServiceProvider;
use Ducal\Base\Traits\LoadAndPublishDataTrait;

class DataSynchronizeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('packages/data-synchronize')
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadAndPublishViews();
    }
}
