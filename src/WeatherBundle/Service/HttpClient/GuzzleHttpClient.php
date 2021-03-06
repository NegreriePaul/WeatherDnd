<?php
namespace App\WeatherBundle\Service\HttpClient;
use GuzzleHttp\Client;

/**
 * GuzzleHttpClient for Requesting Api
 */

class GuzzleHttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;
    public function __construct()
    {
        $this->client = new Client();
    }
    /**
     * @{inheritdoc}
     */
    public function getResponseBody($url)
    {
        $request = $this->client->request('GET', $url);
        return $request->getBody();
    }
}

