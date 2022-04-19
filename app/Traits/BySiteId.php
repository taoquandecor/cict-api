<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BySiteId
{
    public function WhereBySiteIds(?Builder $builder, array $sites, ?string $column) : Builder
    {
        try {
            if (!empty($column) && count($sites) > 0) {
               return $builder->whereIn($column, $sites);
            }

            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    public function WhereByOrganizationId(?Builder $builder, string $organizationId, ?string $column) : Builder
    {
        try {
            if (!empty($column) && !empty($organizationId)) {
                return $builder->where($column, $organizationId);
            }
            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }
}
