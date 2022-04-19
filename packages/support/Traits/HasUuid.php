<?php

namespace Support\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuid
{
    /**
     * Generate uuid on creating model event
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
            }
        });
    }
}
