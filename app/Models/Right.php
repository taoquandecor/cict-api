<?php

namespace App\Models;

use App\Models\Columns\RightColumn;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Support\Models\BaseModel;

class Right extends BaseModel
{
    use RightColumn;

    public $table = "tbRight";

    public static $name = "tbRight";

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $casts = [
        'Id'    => 'string'
    ];

    protected $fillable = [
        'RoleId',
        'FeatureId',
        'RightValue'
    ];

    /**
     * relation one to one with tbFunction
     * @return HasOne
     */
    public function Features()
    {
        return $this->hasOne(Feature::class, Feature::$key, Feature::$key);
    }
}
