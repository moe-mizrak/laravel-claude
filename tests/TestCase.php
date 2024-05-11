<?php

namespace MoeMizrak\LaravelClaude\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use MoeMizrak\LaravelClaude\ClaudeServiceProvider;
use MoeMizrak\LaravelClaude\Facades\LaravelClaude;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    use WithFaker;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            ClaudeServiceProvider::class,
        ];
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageAliases($app): array
    {
        return [
            'LaravelClaude' => LaravelClaude::class,
        ];
    }
}