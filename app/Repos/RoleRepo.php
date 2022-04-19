<?php

namespace App\Repos;

use App\Models\Account2Role;
use App\Models\Role;

class RoleRepo extends BaseRepo
{
    function model()
    {
        return Role::class;
    }

    /**
     * search roles
     * @return mixed
     */
    public function Search()
    {
        $query = $this->query()
            ->distinct()
            ->leftJoin(Account2Role::$name, Role::$_Id, Account2Role::$_RoleId);

        $query = $this->FilterLike($query, 'keyword', [Role::$_Code, Role::$_DisplayName]);

        $query = $query->groupBy([
            Role::$_Id,
            Role::$_Code,
            Role::$_DisplayName,
            Role::$_DefaultRedirect,
            Role::$_Level,
            Role::$_ChangedDate,
            Role::$_ChangedBy
        ])->selectRaw(sprintf('%s, COUNT(%s) AS TotalUser', Role::$_All, Account2Role::$_AccountId));

        return $this->Pagination($query);
    }

    public function GetListRole()
    {
        return $this->query()->get([Role::$_Id, Role::$_DisplayName]);
    }
}
