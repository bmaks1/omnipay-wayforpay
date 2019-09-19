<?php

namespace Bmaks1\Wayforpay\Facades;

/*
 * Class Facade
 * @package Bmaks1\Wayforpay\Facades
 * @see Bmaks1\Wayforpay\WayforpayGateway
 */

use Illuminate\Support\Facades\Facade;

class Wayforpay extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wayforpay';
    }
}