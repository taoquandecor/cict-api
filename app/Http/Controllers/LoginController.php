<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\ForgotRequest;
use App\Http\Requests\Login\LoginRequest;
use App\Services\LoginService;
use Support\Http\Controllers\BaseController;

class LoginController extends BaseController
{
    private $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function Login(LoginRequest $request)
    {
        return $this->service->Login($request);
    }

    public function Forgot(ForgotRequest $request)
    {
        return $this->service->Forgot($request);
    }
}
