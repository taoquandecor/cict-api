<?php

namespace App\Models;

use App\Models\Columns\Account2RoleColumn;
use Support\Models\BaseModel;

class Account2Role extends BaseModel
{
    use Account2RoleColumn;

    protected $table = 'tbAccount2Role';

    public static $name = 'tbAccount2Role';

    protected $fillable = [
        'RoleId',
        'AccountId'
    ];
}
