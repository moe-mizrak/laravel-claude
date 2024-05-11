<?php

namespace MoeMizrak\LaravelClaude;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleRetry\GuzzleRetryMiddleware;
use Illuminate\Support\ServiceProvider;

class ClaudeServiceProvider extends ServiceProvider
{
    /**
     * The default timeout for the Guzzle client.
     *
     * @var int
     */
    const DEFAULT_TIMEOUT = 10;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPublishing();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->configure();

        $this->app->bind(ClaudeRequest::class, function () {
            return new ClaudeRequest(
                $this->configureClient()
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['laravel-claude'];
    }

    /**
     * Setup the configuration.
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-claude.php', 'laravel-claude'
        );
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-claude.php' => config_path('laravel-claude.php'),
            ], 'laravel-claude');
        }
    }

    /**
     * Configure the Guzzle client.
     *
     * @return \GuzzleHttp\Client
     */
    private function configureClient(): Client
    {
        // Set the default configuration for retrying requests
        $retryOptions = [
            'max_retry_attempts' => 5,
            'retry_on_status'    => [429, 500, 502, 503, 504],
            'retry_on_timeout'   => true,
        ];

        // Create a handler stack with the retry middleware.
        $handlerStack = HandlerStack::create();

        // Add the retry middleware to the handler stack.
        $handlerStack->push(GuzzleRetryMiddleware::factory($retryOptions));

        // Create and return a Guzzle client with the base_uri, timeout, headers and handler stack request options
        return new Client([
            'base_uri' => config('laravel-claude.api_endpoint'),
            'timeout'  => self::DEFAULT_TIMEOUT,
            'headers'  => [
                'x-api-key'         => config('laravel-claude.api_key'),
                'anthropic-version' => '2023-06-01',
                'content-type'      => 'application/json',
            ],
            'handler'  => $handlerStack,
        ]);
    }
}