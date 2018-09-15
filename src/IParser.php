<?php
/**
 * <pre>
 * Created by:  15.09.2018 11:14
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IParser
{
    public function parse(string $string) :array;
}