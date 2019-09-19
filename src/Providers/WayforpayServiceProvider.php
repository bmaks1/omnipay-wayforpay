<?php

namespace Bmaks1\Wayforpay\Providers;

/*
 * Class WayforpayServiceProvider
 * @package Bmaks1\Wayforpay
 */

use Illuminate\Support\ServiceProvider;
use Bmaks1\Wayforpay\WayforpayGateway;

class WayforpayServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;



    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wayforpay_gateway', function () {
            return new WayforpayGateway();
        });

    }


}
