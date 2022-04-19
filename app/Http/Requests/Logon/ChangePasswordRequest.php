<?php

namespace App\Http\Requests\Logon;

use Illuminate\Support\Facades\Hash;
use Support\Http\Requests\BaseRequest;

class ChangePasswordRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'OldPassword' => 'required',
            'NewPassword' => 'required|min:5|max:32',
            'RePassword'  => 'required|same:NewPassword',
        ];

        if (!Hash::check($this->get('OldPassword'), $this->Admin()->Password)) {
            $rules['OldPassword'] = 'required|same:1';
        }

        if ($this->get('OldPassword') === $this->get('NewPassword')) {
            $rules['NewPassword'] = 'required|min:5|max:32|same:1';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'OldPassword' => 'Old Password',
            'NewPassword' => 'New Password',
            'RePassword'  => 'Re-Password'
        ];
    }

    public function messages()
    {
        return [
            'OldPassword.same' => 'Your password is not valid.',
            'NewPassword.same' => "Old and new password can't match."
        ];
    }

    public function Data() : array
    {
        return [
            'PasswordChangeDate' => $this->Now(),
            'Password'           => bcrypt($this->get('NewPassword')),
            'ChangedDate'        => $this->Now(),
            'ChangedBy'          => $this->Admin()->AccountId
        ];
    }
}
