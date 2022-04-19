<?php

namespace App\Models;

use App\Models\Columns\FeatureColumn;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Models\BaseModel;
use Support\Traits\HasUuid;

class Feature extends BaseModel
{
    use FeatureColumn, HasUuid;

    public $table = 'tbFeature';

    public static $name = 'tbFeature';

    protected $primaryKey = 'Id';

    public static $key = 'Id';

    public static $groupId = 'GroupId';

    protected $keyType = 'string';

    protected $casts = [
        'Id' => 'string',
    ];

    protected $fillable = [
        'Code',
        'DisplayName',
        'RightValue',
        'GroupId',
        'Icon',
        'Sort'
    ];

    /**
     * relation has many to function detail model (one to many)
     * @return HasMany
     */
    public function Details()
    {
        return $this->hasMany(FeatureDetail::class, FeatureDetail::$featureId, $this->primaryKey);
    }
}
