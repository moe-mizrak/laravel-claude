<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Anthropic - Claude API Key
    |--------------------------------------------------------------------------
    |
    | Here you may specify the API key for accessing the Claude API.
    | This key is required to authenticate your requests to the Claude service.
    | You can obtain your API key from the Claude dashboard.
    |
    */
    'api_key'      => env('CLAUDE_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Anthropic - Claude API Endpoint
    |--------------------------------------------------------------------------
    |
    | Here you may specify the endpoint URL for the Claude API.
    | This is the URL where your application will send requests to interact with Claude.
    | You can find the API endpoint URL in the Claude documentation.
    |
    */
    'api_endpoint' => env('CLAUDE_API_ENDPOINT'),
];