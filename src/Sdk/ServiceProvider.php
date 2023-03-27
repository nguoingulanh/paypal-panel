<?php

namespace PaypalPanel;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Throwable;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {

    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->mergeConfigFrom($this->getConfig(), 'paypal-panel');
    }

    /**
     * Get the config file path.
     */
    protected function getConfig(): string
    {
        return __DIR__.'/../config/config.php';
    }
}
