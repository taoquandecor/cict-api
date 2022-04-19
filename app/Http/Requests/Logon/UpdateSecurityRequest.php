<?php

namespace App\Http\Requests\Logon;

use Support\Http\Requests\BaseRequest;

class UpdateSecurityRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'Email' => 'required|email|max:256',
        ];
    }

    public function Data() : array
    {
        return [
            'Email'       => $this->get('Email'),
            'ChangedDate' => $this->Now(),
            'ChangedBy'   => $this->Admin()->AccountId
        ];
    }
}
