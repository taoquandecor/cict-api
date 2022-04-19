<?php

namespace App\Repos;

use App\Models\Feature;

class FeatureRepo extends BaseRepo
{
    function model()
    {
        return Feature::class;
    }

    public function Search()
    {
        $query = $this->query();

        $query = $this->FilterWhereIn($query, 'select', [Feature::$_GroupId]);

        $query = $this->FilterLike($query, 'keyword', [
            Feature::$_Code,
            Feature::$_DisplayName,
        ]);

        $query = $query->orderBy(Feature::$_Sort);

        return $this->Pagination($query);
    }

    public function GetArrayFeatures()
    {
        return $this->query()->pluck(Feature::$_Id, Feature::$_Code);
    }
}
