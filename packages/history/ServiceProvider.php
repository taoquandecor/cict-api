<?php

namespace History;

use History\Providers\EventServiceProvider;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{
    protected $namespace = "History\Http\Controllers";

    public function boot()
    {
        $this->routes();
    }

    private function routes()
    {
        if (file_exists(__DIR__ . '/Routes/Routes.php')) {
            Route::namespace($this->namespace)
                ->group(__DIR__ . '/Routes/Routes.php');
        }
    }

    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
