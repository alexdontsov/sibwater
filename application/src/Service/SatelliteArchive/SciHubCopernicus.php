<?php

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class SciHubCopernicus
 */
class SciHubCopernicus
{
    /**
     * @return int
     * @throws TransportExceptionInterface
     */
    private function getData()
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://scihub.copernicus.eu/dhus/odata/v1/Products(\'22e7af63-07ad-4076-8541-f6655388dc5e\')/$value', [
                'auth_basic' => ['rumato', '123qweR$'],
                'headers' => [
                    'Content-Type' => 'text/plain',
                ],
            ]
        );

        $statusCode = $response->getStatusCode();


        if (200 !== $response->getStatusCode()) {
            throw new \Exception('...');
        }

// get the response content in chunks and save them in a file
// response chunks implement Symfony\Contracts\HttpClient\ChunkInterface
        $fileHandler = fopen('/home/alex/DCORP/Symfony/sibwater/ubuntu.zip', 'w');
        foreach ($client->stream($response) as $chunk) {
            fwrite($fileHandler, $chunk->getContent());
        }


//        // $statusCode = 200
//        $contentType = $response->getHeaders()['content-type'][0];
//        // $contentType = 'application/json'
//        $content = $response->getContent();
//        // $content = '{"id":521583, "name":"symfony-docs", ...}'
//        $content = $response->toArray();
//        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
//        $z = $content;
        return 1;
    }
}
