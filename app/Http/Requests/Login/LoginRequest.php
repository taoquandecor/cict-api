<?php

namespace App\Http\Requests\Login;

use App\General\Config;
use Support\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Username'  => 'required',
            'Password'  => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'Username'  => __('Username'),
            'Password'  => __('Password')
        ];
    }

    public function Data(string $id, string $token): array
    {
        return [
            'AccountId' => $id,
            'Token'     => $token,
            'ValidTo'   => now()->addMinutes(Config::TOKEN_ALIVE)->format(Config::DATE_FULL),
            'IP'        => $this->ip(),
            'Agent'     => $this->userAgent(),
            'SiteId'    => '592ec499-4a7b-4116-8904-261a609608a4',
        ];
    }
}
