<?php
namespace App\WeatherBundle\Service\HttpClient;
/**
 * Client for Requesting api
*/

interface HttpClientInterface
{
    /**
     * @param string $url
     * @return string response body
     */
    public function getResponseBody($url);
}