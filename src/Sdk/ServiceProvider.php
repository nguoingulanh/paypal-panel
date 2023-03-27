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
        $this->registerPublishing();
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom($this->getConfig(), 'paypal-panel');
    }

    /**
     * Get the config file path.
     */
    protected function getConfig(): string
    {
        return __DIR__.'/config/paypal-panel.php';
    }

    /**
     * Register the package's publishable resources.
     */
    protected function registerPublishing(): void
    {
        $this->publishes([$this->getConfig() => config_path('paypal-panel.php')], 'config');
    }
}
