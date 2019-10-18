<?php

namespace App\WeatherBundle\Tests;

use App\WeatherBundle\Entity\Weather;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\WeatherBundle\Service\Weather\MapWeatherService;
use App\WeatherBundle\Service\HttpClient\GuzzleHttpClient;
/**
 * Tests OpenWeatherMapService
 * 
 * @author Ahmet Akbana
 */
class TestWeather extends KernelTestCase
{
    /**
     * Tests get Weather as stdclass
     */
    public function testGetWeather()
    {
        $response = $this->service->getWeather('paris');
        $this->assertTrue($response->cod === 200);
        $this->assertTrue($response->name === 'Paris');
        $this->assertEquals(1, count($response->weather));
    }

    /**
     * Tests get Weather as Weather object
     */
    public function testGetWeatherObject()
    {
        $response = $this->service->getWeatherObject('paris');
        /** @var Weather $weather */
        foreach ($response as $weather) {
            $this->assertTrue($weather->getCity() == 'Paris');
            $this->assertTrue(is_numeric($weather->getTemperature()));
            $this->assertTrue(date('d-m-Y', strtotime($weather->getWdate())) == $weather->getWdate());
            $this->assertTrue($weather->getDescription() !== '');
        }
    }

}

?>