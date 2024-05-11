<?php

namespace MoeMizrak\LaravelClaude;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Claude request and formed response class.
 *
 * Claude doc: https://docs.anthropic.com/claude/reference/messages_post
 *
 * Class ClaudeRequest
 * @package MoeMizrak\LaravelClaude
 */
class ClaudeRequest extends ClaudeAPI
{
    /**
     * Test request for a basic Hello message -- todo will be removed after access to claude is granted
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function testRequest()
    {
        // JSON payload to be sent in the request body
        $jsonPayload = [
            'model' => 'claude-3-haiku-20240307',
            'max_tokens' => 1024,
            'messages' => [
                ['role' => 'user', 'content' => 'Hello, world']
            ]
        ];

        // Options for the Guzzle request
        $options = [
            'json' => $jsonPayload, // Set the request body as JSON
        ];

        return $this->client->post('', $options);
    }
}