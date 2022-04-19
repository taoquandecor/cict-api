<?php

namespace App\Http\Middleware;

use App\Models\Login;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Support\General\Config;
use Support\Http\Middleware\BaseMiddleware;
use Support\Traits\Helpers;

class VerifyAdmin extends BaseMiddleware
{
    use Helpers;

    const RESPONSE = Config::ADMIN_LOGIN;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next = null)
    {
        $token = $this->GetToken();

        if (empty($token)) {
            return $this->response->ForceLogout(__("Token Invalid"));
        }

        $login = $this->AdminLogin();

        if (!$login) {
            return $this->response->ForceLogout(__("Token Invalid"));
        }

        return $this->Verify($request, $next, $login);
    }

    /**
     * verify user token
     * @param Request $request
     * @param Closure $next
     * @param Login $login
     * @return JsonResponse|mixed
     */
    protected function Verify($request, Closure $next, Login $login)
    {
        try {
            if ($login->Disabled() || $login->Removed()) {
                return $this->response->ForceLogout(__("Token Invalid"));
            }

            if (!$login->ValidDate()) {
                return $this->response->ForceLogout(__("Token Timeout"));
            }

            $this->MergeRequest([self::RESPONSE => $login]);

            $login->IncreaseValidDate();

            return $next($request);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
