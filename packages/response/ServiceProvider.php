<?php

namespace Response;

use \Illuminate\Support\ServiceProvider as Service;
use Response\Contracts\ResponseContract;

class ServiceProvider extends Service
{
    public function boot()
    {
        $this->config();
    }

    public function register(){
        $this->app->bind(ResponseContract::class, Response::class);
    }

    /**
     * register config of module to root module
     */
    private function config()
    {
        if (file_exists(__DIR__ . '/Config.php')) {
            $this->mergeConfigFrom(__DIR__ . '/Config.php', 'RESPONSE');
        }
    }
}