<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\GetRequest;
use App\Services\DashboardService;
use Support\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    protected $service;

    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function Index()
    {
        return $this->service->Index();
    }
}
