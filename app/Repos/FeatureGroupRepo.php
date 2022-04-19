<?php

namespace App\Repos;

use App\General\Feature as FeatureConfig;
use App\General\Role;
use App\Models\Account;
use App\Models\Account2Role;
use App\Models\Feature;
use App\Models\Right;
use App\Models\FeatureGroup;

class FeatureGroupRepo extends BaseRepo
{
    function model()
    {
        return FeatureGroup::class;
    }

    public function Search()
    {
        $query = $this->query();

        $query = $this->FilterWhereIn($query, 'select', [FeatureGroup::$_Application]);

        $query = $this->FilterLike($query, 'keyword', [
            FeatureGroup::$_Code,
            FeatureGroup::$_DisplayName,
        ]);

        $query = $query->orderBy(FeatureGroup::$_Sort)->orderByDesc(FeatureGroup::$_Application);

        return $this->Pagination($query);
    }

    public function GetAll()
    {
        return $this->query()->with([
            'Features'         => function ($query) {
                $query->orderBy(Feature::$_Sort);
            },
            'Features.Details' => function ($query) {
                $query->orderBy('Sort');
            }
        ])->orderBy(FeatureGroup::$_Application)->orderBy(FeatureGroup::$_Sort)->get();
    }

    public function GetMenuByUerId($id)
    {
        return $this->query()
            ->join(Feature::$name, FeatureGroup::$_Id, Feature::$_GroupId)
            ->join(Right::$name, Feature::$_Id, Right::$_FeatureId)
            ->join(Account2Role::$name, Right::$_RoleId, Account2Role::$_RoleId)
            ->join(Account::$name, Account2Role::$_AccountId, Account::$_Id)
            ->where(Account::$_Id, $id)
            ->whereRaw(sprintf("CHARINDEX('%s', %s) > 0", Role::READ, Right::$_RightValue))
            ->orderByRaw(sprintf("MAX(%s) ASC", FeatureGroup::$_Sort))
            ->orderByRaw(sprintf("MAX(%s) ASC", Feature::$_Sort))
            ->groupBy([
                FeatureGroup::$_Icon,
                FeatureGroup::$_Code,
                FeatureGroup::$_DisplayName,
                Feature::$_Code,
                Feature::$_DisplayName,
                Feature::$_Icon
            ])
            ->get([
                sprintf("%s AS GroupIcon", FeatureGroup::$_Icon),
                sprintf("%s AS GroupCode", FeatureGroup::$_Code),
                sprintf("%s AS GroupName", FeatureGroup::$_DisplayName),
                sprintf("%s AS FeatureCode", Feature::$_Code),
                sprintf("%s AS FeatureName", Feature::$_DisplayName),
                sprintf("%s AS FeatureIcon", Feature::$_Icon),
            ]);
    }
}
