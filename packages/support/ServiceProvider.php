<?php

namespace Support;

use \Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{
    protected $namespace = "Support";

    public function boot()
    {
        $this->lang();
    }

    private function lang()
    {
        if (is_dir(__DIR__ . './Lang')) {
            $this->loadJsonTranslationsFrom(__DIR__ . './Lang');
        }
    }
}
