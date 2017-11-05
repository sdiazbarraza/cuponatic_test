<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production') {     URL::forceScheme('https'); }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          $request=$this->app->make('request');
        $request->setTrustedProxies(['proxyip']);
        $ip=$request->ip();

        if ($ip=="127.0.0.1" ||$ip=="::1" || $ip=="myip" ){
            \Config::set('app.debug', true);
            \Config::set('app.env','local');

        }else{
            \Config::set('app.debug', true);
            \Config::set('app.env','production');            
        }  

   }
}
