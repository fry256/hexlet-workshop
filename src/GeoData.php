<?php
/**
 * <pre>
 * Created by:  15.09.2018 10:51
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class GeoData implements IGeoData
{
    private $city;

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity() :string
    {
        return $this->city;
    }
}