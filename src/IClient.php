<?php
/**
 * <pre>
 * Created by:  15.09.2018 5:34
 * Email:       up@kodix.ru
 * Developer:   Petrov Yuri
 * </pre>
 */

namespace Fry256\HexletWorkshop;

interface IClient
{
    public function send() :IResponse;
}