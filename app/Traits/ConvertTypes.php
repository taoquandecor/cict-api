<?php

namespace App\Traits;

use Carbon\Carbon;

trait ConvertTypes
{
    public function ConvertToArray(string $keyword)
    {
        try {
            if (!request()->has($keyword) || empty(request($keyword))) {
                return [];
            }

            return explode(',', request($keyword));
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function ConvertToString(string $keyword)
    {
        try {
            if (!request()->has($keyword) || empty(request($keyword))) {
                return '';
            }

            return request($keyword);
        } catch (\Exception $ex) {
            return '';
        }
    }

    public function ConvertToDate(string $keyword, string $format) {
        try {
            if (!request()->has($keyword) || empty(request($keyword))) {
                return '';
            }

            return Carbon::parse(request($keyword))->format($format);
        } catch (\Exception $ex) {
            return '';
        }
    }
}
