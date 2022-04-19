<?php

namespace App\Models;

use App\Models\Columns\FeatureGroupColumn;
use Support\Models\BaseModel;
use Support\Traits\HasUuid;

class FeatureGroup extends BaseModel
{
    use FeatureGroupColumn, HasUuid;

    public $table = 'tbFeatureGroup';

    public static $name = 'tbFeatureGroup';

    protected $primaryKey = 'Id';

    public static $key = 'Id';

    protected $keyType = 'string';

    protected $casts = [
        'Id' => 'string',
    ];

    protected $fillable = [
        'Code',
        'DisplayName',
        'Icon',
        'Sort',
        'Application',
    ];

    /**
     * relation belong to function model (one to many)
     */
    public function Features()
    {
        return $this->hasMany(Feature::class, Feature::$groupId, $this->primaryKey);
    }
}
