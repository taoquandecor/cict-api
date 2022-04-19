<?php

namespace History\Http\Controllers;

use History\Services\HistoryService;
use Support\Http\Controllers\BaseController;

class HistoryController extends BaseController
{
    protected $service;

    public function __construct(HistoryService $service)
    {
        $this->service = $service;
    }

    public function Index($ids)
    {
        return $this->service->Index($ids);
    }
}
