<?php
/**
 * <pre>
 * Created by:  15.09.2018 9:35
 * Email:       up@kodix.ru
 * Web:         www.kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

class JsonParser implements IParser
{
    public function parse(string $string): array
    {
        return json_decode($string, true);
    }
}