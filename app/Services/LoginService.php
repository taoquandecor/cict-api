<?php

namespace App\Services;

use App\Http\Requests\Login\ForgotRequest;
use App\Http\Requests\Login\LoginRequest;
use App\Repos\AccountRepo;
use App\Repos\LoginRepo;
use App\Repos\RightRepo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Support\Services\BaseService;

class LoginService extends BaseService
{
    private $account, $right, $login;

    public function __construct(
        AccountRepo $account,
        RightRepo $right,
        LoginRepo $login
    ) {
        parent::__construct();
        $this->account = $account;
        $this->right = $right;
        $this->login = $login;
    }

    public function Login(LoginRequest $request)
    {
        try {


            $user = $this->account->GetAccountByCode($request->get('Username'));


            if (!$user || $user->Removed()) {
                return $this->response->Unauthorized(__('Account not exists'));
            }

            if ($user->Disabled()) {
                return $this->response->Unauthorized(__('Account has been blocked'));
            }

            if ($user->MaxAttempts()) {
                $user->Lock();

                return $this->response->Unauthorized(__('Login failed too many times.Your account has been blocked'));
            }

            $login = Hash::check($request->get('Password'), $user->Password);

            if (!$login) {
                $user->IncreaseAttempts();

                return $this->response->Unauthorized(__('Password is invalid'));
            }

            $user->ClearAttempts();

            $token = $this->CreateToken();

            $this->login->create($request->Data($user->AccountId, $token));

            $login = $this->AdminLogin($token);

            $login->Roles = $this->right->GetRelation($user->AccountId);

            return $this->response->Success(['Token' => $token, 'User' => $login]);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

    public function Forgot(ForgotRequest $request)
    {
        try {
            $password = $this->account->AutoPassword();
            $user = $this->account->ForgotPassword($password, $request->Data($password), request('AccountCode'));

            if (!$user) {
                return $this->response->Unauthorized(__('Account not exists'));
            }

            if (!empty($user->Email)) {
                event($this->SendMail($user, $subject = 'Forgot password information !', $template = 'emails.reset_password'));
            }

            return $this->response->Success(['Msg' => __("Operation was successful")]);
        } catch (\Exception $ex) {
            return $this->response->ServerError();
        }
    }
}
