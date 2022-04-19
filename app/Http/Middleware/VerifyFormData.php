<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Support\Http\Middleware\BaseMiddleware;
use Support\Traits\Helpers;

class VerifyFormData extends BaseMiddleware
{
    use Helpers;

    private $methods = [
        'POST',
        'PUT',
        'PATCH',
        'DELETE'
    ];

    /**
     * VerifyFormData constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $method = strtoupper($request->method());
            if (!in_array($method, $this->methods)) {
                return $next($request);
            }
            $hash = $request->get('SecurityHash');
            $key = $this->GetSecurity($request);
            if (strcmp($key, $hash) != 0) {
                return $this->response->ValidateRequestErrors([__('Security Hash Error')]);
            }
            return $next($request);
        } catch (\Exception $e) {
            return $this->response->ServerError();
        }
    }

    /**
     * @param Request $request
     * @param string hash_key
     * @return mixed
     */
    public function GetSecurity($request)
    {
        $body = json_decode($request->getContent());
        unset($body->SecurityHash);
        $body->hash_key = $this->Admin()->Hash;
        $data_string = json_encode($body);

        return sha1($data_string);
    }
}
