# WeatherDnd

to install with composer :

```bash
composer require dndtest/weather-bundle
```
```bash
<?php

return [
    
    App\WeatherBundle\WeatherBundleDnD::class => ['all' => true],
];
```

Put in your .env your own [APP_apikey]( https://openweathermap.org)

You can use as Twig extension

```bash
{{ get_weather('Paris') }}
```

