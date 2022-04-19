<?php

namespace App\Models;

use App\General\Feature;
use App\General\Config;
use App\Models\Columns\AccountColumn;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Support\Models\BaseModel;
use Support\Traits\HasUuid;

/**
 * @property mixed  Status
 * @property mixed  FailedLoginAttempts
 * @property string FacilityId
 * @property mixed  Password
 * @property mixed  AccountId
 * @property array  Roles
 * @property mixed  Super
 */
class Account extends BaseModel implements AuthenticatableContract
{
    use Authenticatable, AccountColumn, HasUuid;

    protected $table = 'tbAccount';

    public static $name = 'tbAccount';

    protected $primaryKey = "Id";

    public static $key = "Id";

    protected $keyType = 'string';

    protected $casts = [
        'Id' => 'string',
    ];

    protected $hidden = [
        'Password'
    ];

    protected $fillable = [
        'CategoryId',
        'PartnerId',
        'DepartmentId',
        'Status',
        'Code',
        'DisplayName',
        'Email',
        'Email_CC',
        'Phone',
        'Password',
        'FailedLoginAttempts',
        'PasswordChangeDate',
        'ForcePasswordChange',
        'LoginStatus',
        'ChangedDate',
        'ChangedBy',
        'CreatedDate',
        'CreatedBy',
        'DefaultRedirect',
        'Super',
        'Deleted',
    ];

    /**
     * relation many to many with tbRole
     * @return BelongsToMany
     */
    public function Roles()
    {
        return $this->belongsToMany(Role::class, Account2Role::class, 'AccountId',
            'RolesId');
    }

    /**
     * @return bool
     */
    public function Removed(): bool
    {
        return $this->Status == Config::DELETED;
    }

    /**
     * @return bool
     */
    public function Disabled(): bool
    {
        return $this->Status == Config::BLOCKED;
    }

    /**
     * @return bool
     */
    public function Active(): bool
    {
        return $this->Status == Config::ACTIVE;
    }

    /**
     * @return bool
     */
    public function MaxAttempts(): bool
    {
        return $this->FailedLoginAttempts >= Config::MAX_ATTEMPTS;
    }

    /**
     * lock account
     * @return bool
     */
    public function Lock(): bool
    {
        $this->Status = Config::BLOCKED;

        return $this->save();
    }

    /**
     * increase login failed attempts
     */
    public function IncreaseAttempts(): bool
    {
        $this->FailedLoginAttempts += Config::INCREASE_ATTEMPTS;

        return $this->save();
    }

    /**
     * clear login failed
     * @return mixed
     */
    public function ClearAttempts(): bool
    {
        $this->FailedLoginAttempts = Config::CLEAR_ATTEMPTS;

        return $this->save();
    }

}
