<?php
/**
 * <pre>
 * Created by:  15.09.2018 9:33
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IParser
{
    public function parse(string $string) :array;
}