<?php

namespace App\Http\Controllers;

use App\Http\Requests\Logon\ChangePasswordRequest;
use App\Http\Requests\Logon\UpdateProfileRequest;
use App\Http\Requests\Logon\UpdateSecurityRequest;
use App\Services\LogonService;
use Support\Http\Controllers\BaseController;

class LogonController extends BaseController
{
    private $service;

    public function __construct(LogonService $service)
    {
        $this->service = $service;
    }

    public function Profile()
    {
        return $this->service->Profile();
    }

    public function UpdateProfile(UpdateProfileRequest $request)
    {
        return $this->service->UpdateProfile($request);
    }

    public function UpdateSecurity(UpdateSecurityRequest $request)
    {
        return $this->service->UpdateSecurity($request);
    }

    public function ChangePassword(ChangePasswordRequest $request)
    {
        return $this->service->ChangePassword($request);
    }

    public function Refresh()
    {
        return $this->service->Refresh();
    }

    public function Menu()
    {
        return $this->service->Menu();
    }
}
