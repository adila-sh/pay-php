<?php

namespace AdilaPay\Laravel;

use AdilaPay\AdilaPayClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class AdilaPayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/adila-pay.php', 'adila-pay');

        $this->app->singleton(AdilaPayClient::class, function (Application $app): AdilaPayClient {
            $config = $app['config']->get('adila-pay', []);
            $apiKey = $config['api_key'] ?? null;
            if (!is_string($apiKey) || $apiKey === '') {
                throw new InvalidArgumentException('Defina ADILA_PAY_API_KEY (config adila-pay.api_key).');
            }

            $options = [];
            if (!empty($config['base_url'])) {
                $options['baseUrl'] = (string) $config['base_url'];
            }
            if (isset($config['timeout'])) {
                $options['timeout'] = (float) $config['timeout'];
            }
            if (isset($config['max_retries'])) {
                $options['maxRetries'] = (int) $config['max_retries'];
            }

            return new AdilaPayClient($apiKey, $options);
        });
        $this->app->alias(AdilaPayClient::class, 'adila-pay');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/adila-pay.php' => $this->app->configPath('adila-pay.php'),
            ], 'adila-pay-config');
        }
    }
}
