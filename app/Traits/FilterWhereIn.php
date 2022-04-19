<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterWhereIn
{
    protected function FilterWhereIn(Builder $builder, ?string $keyword = '', array $columns = []): Builder
    {
        try {
            $value = $this->ConvertToArray($keyword);
            if (count($columns) > 0 && count($value) > 0) {
                return $this->GenerateWhereInQuery($builder, $columns, $value);
            }

            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function GenerateWhereInQuery(Builder $builder, array $columns, array $value): Builder
    {
        try {
            foreach ($columns as $key => $column) {
                $builder = $builder->whereIn($column, $value);
            }

            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }
}
