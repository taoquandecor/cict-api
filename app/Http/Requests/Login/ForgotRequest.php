<?php

namespace App\Http\Requests\Login;

use App\General\Config;
use App\Models\Account;
use Illuminate\Validation\Rule;
use Support\Http\Requests\BaseRequest;

class ForgotRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'AccountCode' => [
                'required',
                Rule::exists(Account::$name, Account::$_Code)->where(Account::$_Status, Config::ACTIVE)
            ]
        ];
    }

    public function attributes()
    {
        return [
            'AccountCode' => 'Username'
        ];
    }

    public function Data($password)
    {
        return [
            'Password'            => bcrypt($password),
            'ForcePasswordChange' => Config::REQUIRE_CHANGE_PASSWORD,
        ];
    }
}
