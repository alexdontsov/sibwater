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

    }

    /**
     * @param array $context
     */
    public function getData(array $context)
    {
        $response = $this->client->request('POST', $this->endpoint, []);
    }
}