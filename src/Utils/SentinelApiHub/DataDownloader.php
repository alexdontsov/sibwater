<?php

namespace App\Utils\SentinelApiHub;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class DataDownloader
 * @package App\Utils\SentinelApiHub
 */
class DataDownloader
{
    private $client;
    private $endpoint;

    /**
     * DataDownloader constructor.
     * @param HttpClientInterface $client
     * @param string $apiKey
     */
    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->client = $client;
        $this->endpoint = sprintf('https://%s.rest.akismet.com/1.1/comment-check', $apiKey);
    }

    /**
     * @param array $context
     * @return int
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getData(array $context)
    {
        $response = $this->client->request('POST', $this->endpoint, []);

        $headers = $response->getHeaders();
        if ('discard' === ($headers['x-akismet-pro-tip'][0] ?? '')) {
            return 2;
        }
        $content = $response->getContent();
        if (isset($headers['x-akismet-debug-help'][0])) {
            throw new \RuntimeException(sprintf('Unable to check for spam: %s
                   (%s).', $content, $headers['x-akismet-debug-help'][0]));
        }

        return 'true' === $content ? 1 : 0;
    }
}