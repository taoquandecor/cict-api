<?php

namespace App\Http\Requests\Logon;

use Support\Http\Requests\BaseRequest;

class UpdateProfileRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'DisplayName' => 'required|max:100',
            'Phone'       => 'nullable|regex:/^[0-9]{9,16}$/',
        ];
    }

    public function attributes()
    {
        return [
            'DisplayName' => 'Display Name'
        ];
    }

    public function Data() : array
    {
        return [
            'DisplayName' => $this->get('DisplayName'),
            'Phone'       => $this->get('Phone'),
            'ChangedDate' => $this->Now(),
            'ChangedBy'   => $this->Admin()->AccountId
        ];
    }
}
