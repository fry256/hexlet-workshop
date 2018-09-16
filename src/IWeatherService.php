<?php
/**
 * <pre>
 * Created by:  16.09.2018 10:34
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IWeatherService
{
    public function getInfo(string $city) :WeatherInfo;
}