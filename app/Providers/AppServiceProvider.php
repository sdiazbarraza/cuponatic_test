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
       if($this->app->environment() === 'production'){ 
            $this->app['request']->server->set('HTTPS', true); 
            
        }
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

        if ($ip=="127.0.0.1" ||$ip=="::1"  ){
            \Config::set('app.debug', true);
            \Config::set('app.env','local');
       
        }else{
            \Config::set('app.debug', true);
            \Config::set('app.env','production');
            \Config::set('database.connections.mysql.host', 'sql10.freemysqlhosting.net');
            \Config::set('database.connections.mysql.database', 'sql10203202');       
            \Config::set('database.connections.mysql.username','sql10203202');
            \Config::set('database.connections.mysql.password','YrDa4ePZkH');
            \Config::set('database.connections.mysql.port',3306);
            
        }  

   }
}
