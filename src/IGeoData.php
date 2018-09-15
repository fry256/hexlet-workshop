<?php
/**
 * <pre>
 * Created by:  15.09.2018 10:45
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IGeoData
{
    public function setCity($city);
    public function getCity() :string;
}