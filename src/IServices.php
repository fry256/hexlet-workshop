<?php
/**
 * <pre>
 * Created by:  15.09.2018 10:37
 * Email:       up@kodix.ru
 * Web:         www.kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IServices
{
    public function getByIp(string $ip) :IGeoData;
}