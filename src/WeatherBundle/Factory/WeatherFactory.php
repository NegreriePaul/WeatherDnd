<?php

namespace App\WeatherBundle\Factory;

use App\WeatherBundle\Entity\Weather;
use App\WeatherBundle\Service\WeatherService\WeatherServiceInterface;
use Doctrine\Common\Cache\ApcCache;

/**
 * Gets data from Weather Services
 */
class WeatherFactory
{
    /**
     * @var WeatherServiceInterface
     */
    private $weatherService;
    /**
     * @param WeatherServiceInterface $weatherService
     */
    public function __construct(WeatherServiceInterface $weatherService)
    {
        $this->weatherService = $weatherService;
    }
    /**
     * Gets data from api
     *
     * @param string $type
     * @param array  $param
     *
     * @return /stdClass
     */
    public function getData($type, array $param = null)
    {
        return $this->weatherService->getData($type, $param);
    }
    /**
     * @param string $type
     * @param mixed  $city
     * @param array  $param
     *
     * @return /stdClass
     */
    public function getCityData($type, $city, array $param = null)
    {
        return $this->weatherService->getCityData($type, $city, $param);
    }
    /**
     * @param mixed $city
     *
     * @return /stdClass
     */
    public function getWeather($city)
    {
        return $this->weatherService->getWeather($city);
    }
    /**
     * @param mixed $city
     *
     * @return Weather[]
     */
    public function getWeatherObject($city)
    {
        return $this->weatherService->getWeatherObject($city);
    }
   
}