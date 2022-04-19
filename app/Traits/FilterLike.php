<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterLike
{
    protected function FilterLikeValues(Builder $builder, ?string $keyword, ?string $column = ''): Builder
    {
        try {
            $values = $this->ConvertToArray($keyword);
            if (!empty($column) && count($values) > 0) {
                return $this->GenerateLikeValuesQuery($builder, $values, $column);
            }

            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    protected function FilterLike(Builder $builder, ?string $keyword, array $columns = []): Builder
    {
        try {
            $value = $this->ConvertToString($keyword);

            if (empty($columns) || empty($value)) {
                return $builder;
            }

            $builder = $builder->where(function (Builder $query) use ($columns, $value) {
                return $this->GenerateLikeQuery($query, $columns, $value);
            });

            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function GenerateLikeValuesQuery(Builder $builder, array $values, string $column): Builder
    {
        try {
            return $builder->where(function (Builder $b) use ($values, $column) {
                foreach ($values as $key => $value) {
                    $b = $this->Scoped($b, $key, $column, $value);
                }
                return $b;
            });
        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function GenerateLikeQuery(Builder $builder, array $columns, string $value): Builder
    {
        try {
            return $builder->where(function (Builder $b) use ($value, $columns) {
                foreach ($columns as $key => $column) {
                    $b = $this->Scoped($b, $key, $column, $value);
                }

                return $b;
            });

        } catch (\Exception $ex) {
            return $builder;
        }
    }

    private function Scoped(Builder $builder, int $key, string $column, $value)
    {
        if ($key > 0) {
            $builder = $builder->orWhere($column, 'LIKE', "%$value%");
        } else {
            $builder = $builder->where($column, 'LIKE', "%$value%");
        }

        return $builder;
    }
}
