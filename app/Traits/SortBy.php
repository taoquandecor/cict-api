<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SortBy
{
    public function SortBy(Builder $builder, array $orders) : Builder
    {
        try {
            if (count($orders) <= 0) {
                return $builder;
            }

            foreach ($orders as $key => $order) {
                $builder = $builder->orderBy($order, $key);
            }

            return $builder;
        } catch (\Exception $ex) {
            return $builder;
        }
    }
}
