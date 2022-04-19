<?php

namespace Support\Http\Middleware;

use App\Models\Login;
use Response\Response;

class BaseMiddleware
{
    protected $response;

    /**
     * BaseMiddleware constructor.
     */
    public function __construct()
    {
        $this->response = app(Response::class);
    }

    protected function CheckLogin(Login $login)
    {
        return !$login->Disabled() || $login->Removed();
    }
}
