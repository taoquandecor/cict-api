<?php

namespace Export;

use \Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{
    protected $namespace = "Export";

    public function boot()
    {
        $this->view();
    }

    private function view()
    {
        if (is_dir(__DIR__.'/Templates')) {
            $this->loadViewsFrom(__DIR__.'/Templates', 'Export');
        }
    }
}
