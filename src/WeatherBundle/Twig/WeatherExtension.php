<?php

namespace App\WeatherBundle\Twig;

use App\WeatherBundle\Factory\WeatherFactory;
use Symfony\Component\HttpFoundation\Response;
/**
 * Twig extension for rendering weather
 */
class WeatherExtension extends \Twig\Extension\AbstractExtension
{
    /**
     * @var WeatherFactory
     */
    private $weatherFactory;
    /**
     * @param WeatherFactory $weatherFactory
     */
    public function __construct(WeatherFactory $weatherFactory)
    {
        $this->weatherFactory = $weatherFactory;
    }
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('get_weather', array($this, 'weather'), array(
                'is_safe' => array('html'),
                'needs_environment' => true
            )),
        );
    }
    /**
     * Renders weather object of a city
     *
     * @param \Twig_Environment $environment
     * @param mixed (integer|string) $city
     *
     * @return string
     */
    public function weather(\Twig_Environment $environment, $city)
    {
        $weathers = $this->weatherFactory->getWeatherObject($city);
        return $environment->render('@WeatherBundleDnD/weather.html.twig', array(
            'city' => $city,
            'weathers' => $weathers,
        ));
    }

}