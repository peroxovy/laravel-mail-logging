<?php

namespace Peroxovy\LaravelMailLogging\Providers;

use Illuminate\Support\ServiceProvider;
use Peroxovy\LaravelMailLogging\MailLoggingSender;

class MailLoggingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app instanceof \Illuminate\Foundation\Application) {
            $configPath = __DIR__ . '/../config/mail-logging.php';
            $this->publishes([$configPath => config_path('mail-logging.php')], 'config');
        }
    }

    public function register()
    {
        if ($this->app instanceof \Illuminate\Foundation\Application) {
            $configPath = __DIR__ . '/../config/mail-logging.php';
            $this->mergeConfigFrom($configPath, 'mail-logging');
        }

        $this->app->singleton('MailLogging', function () {
            $config = config('mail-logging');
            return new MailLoggingSender(
                $config['from'] ?? 'noreply@example.com',
                $config['to'] ?? [],
                $config['subject'] ?? 'Application Error Log',
                $config['processor_memory_usage'] ?? true,
                $config['processor_memory_peak'] ?? true,
                $config['processor_web'] ?? true,
                $config['processor_git'] ?? true,
            );
        });

        $this->app->alias('MailLogging', MailLoggingSender::class);
    }
}
