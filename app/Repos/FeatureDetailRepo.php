<?php

namespace App\Repos;

use App\Models\FeatureDetail;
use Support\Repos\BaseRepo;

class FeatureDetailRepo extends BaseRepo
{
    function model()
    {
        return FeatureDetail::class;
    }

    public function GetFeatureDetailById(string $featureId){

        if (empty($featureId)) return [];

        $query = $this->query()
            ->where(FeatureDetail::$_FeatureId,$featureId);
        return $query->get();
    }
}
