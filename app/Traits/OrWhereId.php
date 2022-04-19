<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrWhereId
{
    public function OrWhereId(Builder $builder, string $id, ?string $column) : Builder
    {
        try {
            if (empty($column) || empty($id)) {
                return $builder;
            }

            return $builder->orWhere($column, $id);
        } catch (\Exception $ex) {
            return $builder;
        }
    }
}
