<?php

namespace App\WeatherBundle\Service\WeatherService;

use WeatherBundle\Entity\Weather;

/**
 * Gets weather and forecast from api
 */
interface WeatherServiceInterface
{
    /**
     * Gets data from api
     *
     * @param string $type
     * @param array $param
     *
     * @return \stdClass
     */
    public function getData($type, $param);
    /**
     * Gets data by city name or id
     *
     * @param string $type
     * @param mixed (integer|string) $city
     * @param array $param
     *
     * @return \stdClass
     */
    public function getCityData($type, $city, $param);
    /**
     * Gets Weather
     *
     * @param mixed (integer|string) $city
     *
     * @return \stdClass
     */
    public function getWeather($city);
    /**
     * Gets Weather as Object
     *
     * @param mixed (integer|string) $city
     *
     * @return Weather[]
     */
    public function getWeatherObject($city);
   

}