<?php

namespace App\Repos;

use App\Models\Login;
use Support\Repos\BaseRepo;

class LoginRepo extends BaseRepo
{
    function model()
    {
        return Login::class;
    }

    public function DeleteTokensExpired($date)
    {
        $this->query()->where(Login::$_ValidTo, '<=', $date)->delete();
    }
}
