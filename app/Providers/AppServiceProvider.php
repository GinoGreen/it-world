<?php

namespace App\Providers;

use Braintree\Gateway;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'nq7ddcs47mmckmkt',
                    'publicKey' => 'fdbnk29pk5rwrfjm',
                    'privateKey' => 'b866eb6da47d0b2c2666f54d26a8b789'
                ]
            );
        });
    }
}
