# Hexlet workshop
## Библиотека для получения geo данных
Пример использования:
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Fry256\HexletWorkshop\GeoIpService;

$service = new GeoIpService();
$geoData = $service->getData('134.234.3.2');
```

## Библиотека для получения информации о погоде
Пример использования:
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Fry256\HexletWorkshop\ForecastService;

$weather = new ForecastService('openweather');
$weatherInfo = $weather->getForecast('London');
```
Использование в виде CLI приложения:
```bash
bin/weather --service openweather London
```