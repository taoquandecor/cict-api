<?php

namespace App\Repos;

use App\General\Feature as FeatureConfig;
use App\Models\Account2Role;
use App\Models\Feature;
use App\Models\FeatureGroup;
use App\Models\Right;
use Illuminate\Support\Facades\Log;
use Support\Repos\BaseRepo;
use Support\Traits\Helpers;

class RightRepo extends BaseRepo
{
    use Helpers;

    function model()
    {
        return Right::class;
    }

    /**
     * get all role of user
     * @param $id
     * @return array
     */
    public function GetRelation($id)
    {
        $roles = $this->query()
            ->join(Account2Role::$name, Right::$_RoleId, Account2Role::$_RoleId)
            ->join(Feature::$name, Right::$_FeatureId, Feature::$_Id)
            ->join(FeatureGroup::$name, Feature::$_GroupId, FeatureGroup::$_Id)
            ->where(Account2Role::$_AccountId, $id)
            ->select([Right::$_RightValue, Feature::$_Code])
            ->get();

        return $this->RemoveDuplicateRoles($roles);
    }

    /**
     * @param $roles
     * @return array
     */
    private function RemoveDuplicateRoles($roles)
    {
        $results = [];
        foreach ($roles as $role) {
            if (!isset($results[$role->Code])) {
                $results[$role->Code] = $role->RightValue;
                continue;
            }
            $right = sprintf('%s,%s', $results[$role->Code], $role->RightValue);
            $right_arr = array_unique(explode(',', $right));
            $results[$role->Code] = implode(',', $right_arr);
        }
        return $results;
    }

    /**
     * get function value by role id
     * @param $id
     * @return array
     */
    public function GetRoleWithRelation($id)
    {
        return $this->query()
            ->join(Feature::$name, Right::$_FeatureId, Feature::$_Id)
            ->where(Right::$_RoleId, $id)
            ->pluck(Right::$_RightValue, Feature::$_Code)
            ->all();
    }

    /**
     * assign role with new function
     * @param array $data
     * @return bool
     */
    public function AssignRoleWithFunction($data = [])
    {
        return count($data) > 0 ? $this->query()->insert($data) : true;
    }
}
