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
        $this->app->singleton(Gateway::class, function($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '9pfqzxdms9bpp5kh',
                    'publicKey' => 'tstwbjdxw479sjg2',
                    'privateKey' => '32bc1cbd617bea6b53bf045cc29c9420'
                ]
            );
        });
    }
}
