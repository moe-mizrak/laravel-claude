<?php

namespace MoeMizrak\LaravelClaude\Tests;

use MoeMizrak\LaravelClaude\ClaudeRequest;

class ClaudeAPITest extends TestCase
{
    private ClaudeRequest $api;

    public function setUp(): void
    {
        parent::setUp();

        $this->api = $this->app->make(ClaudeRequest::class);
    }

    /**
     * @test
     */
    public function it_successfully_tests_claude_api_request()
    {
        /* SETUP */
        // TODO: params will be added here for testing the request

        /* EXECUTE */
        // params will be sent to testRequest method after access is granted and testRequest is modified.
        $response = $this->api->testRequest();

        /* ASSERT */
        // TODO: assertion for testRequest response
    }
}