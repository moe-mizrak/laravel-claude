<?php

namespace MoeMizrak\LaravelClaude;

use GuzzleHttp\Client;

/**
 * This abstract class forms the response from Claude
 *
 * Class ClaudeAPI
 * @package MoeMizrak\LaravelClaude
 */
abstract class ClaudeAPI
{
    /**
     * ClaudeAPI constructor.
     * @param Client $client
     */
    public function __construct(protected Client $client) {}

}