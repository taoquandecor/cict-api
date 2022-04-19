<?php

namespace App\Models;

use App\Models\Columns\FeatureDetailColumn;
use Support\Models\BaseModel;
use Support\Traits\HasUuid;

class FeatureDetail extends BaseModel
{
    use FeatureDetailColumn,HasUuid;

    public $table = 'tbFeatureDetail';

    public static $name = 'tbFeatureDetail';

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    public static $featureId = 'FeatureId';

    protected $casts = [
        'Id' => 'string',
    ];

    protected $fillable = [
        'FeatureId',
        'DisplayName',
        'RightValue',
        'Icon',
        'Sort'
    ];
}
