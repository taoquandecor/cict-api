<?php

namespace App\Repos;

use App\Models\Account2Role;
use App\Models\Role;
use Support\Repos\BaseRepo;

class Account2RoleRepo extends BaseRepo
{
    function model()
    {
        return Account2Role::class;
    }

    public function GetRoleByUserId($id, array $columns = [])
    {
        $columns = empty($columns) ? [Role::$_Id] : $columns;

        return $this->query()
            ->leftJoin(Role::$name, Account2Role::$_RoleId, Role::$_Id)
            ->where(Account2Role::$_AccountId, $id)
            ->get($columns)
            ->toArray();
    }

    public function UserPivotRole($userId, $request)
    {
        $tbUser2Role = [];
        foreach ($request->get('Roles') as $value) {
            $tbUser2Role[] = ['RoleId' => $value['Id'], 'AccountId' => $userId];
        }
        $this->query()->insert($tbUser2Role);
    }
}
