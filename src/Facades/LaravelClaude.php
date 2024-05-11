<?php

namespace MoeMizrak\LaravelClaude\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelClaude extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-claude';
    }
}