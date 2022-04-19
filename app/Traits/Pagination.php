<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Support\General\Config;
use Support\General\Config as Support;

trait Pagination
{
    protected $exceptKey = [
        Config::ADMIN_LOGIN,
        'page',
    ];

    /**
     * pagination default
     * @param Builder  $query
     * @param int|null $items
     * @return LengthAwarePaginator
     */
    protected function Pagination(Builder $query, ?int $items = Support::PER_PAGE)
    {
        try {
            $items = (int) $items;
        } catch (\Exception $ex) {
            $items = Support::PER_PAGE;
        }

        return $query->paginate($items)->appends(request()->except($this->exceptKey));
    }
}
