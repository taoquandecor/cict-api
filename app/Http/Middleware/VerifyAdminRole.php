<?php

namespace App\Http\Middleware;

use App\Repos\RightRepo;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Support\Http\Middleware\BaseMiddleware;
use Support\Traits\Helpers;

class VerifyAdminRole extends BaseMiddleware
{
    use Helpers;

    protected $right;

    /**
     * VerifyRole constructor.
     * @param RightRepo $right
     */
    public function __construct(RightRepo $right)
    {
        parent::__construct();
        $this->right = $right;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $this->Verify($request, $next);
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    protected function Verify($request, Closure $next)
    {
        try {
            list($code, $func, $right) = explode('.', $request->route()->getName());
            if ($this->Access($code, $right)) {
                return $next($request);
            }
            return $this->response->NoRoles("Code: $code, Right: $right");
        } catch (Exception $ex) {
            return $this->response->NoRoles($ex->getMessage());
        }
    }

    /**
     * check user has role to access controller & method
     * @param string $code
     * @param string $value
     * @return bool
     */
    protected function Access(string $code, string $value = '')
    {
        $roles = $this->GetRoles();
        if (empty($roles) || empty($code) || empty($value)) {
            return false;
        }

        if (is_array($roles) && array_key_exists($code, $roles)) {
            $listRoles = explode(',', $roles[$code]);

            return in_array($value, $listRoles);
        }
        return false;
    }

    /**
     * get roles of account
     * @return array
     */
    protected function GetRoles()
    {
        return $this->right->GetRelation($this->Admin()->AccountId);
    }
}
