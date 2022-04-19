<?php

namespace App\Models;

use App\Models\Columns\RoleColumn;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Support\Models\BaseModel;
use Support\Traits\HasUuid;

class Role extends BaseModel
{
    use RoleColumn, HasUuid;

    protected $table = "tbRole";

    public static $name = "tbRole";

    protected $primaryKey = "Id";

    protected $keyType = 'string';

    protected $casts = [
        'Id' => 'string',
    ];

    protected $fillable = [
        'Code',
        'DisplayName',
        'ChangedDate',
        'ChangedBy',
        'DefaultRedirect',
        'Level',
    ];

    /**
     * relation one to many with tbRight
     * @return hasMany
     */
    public function Rights()
    {
        return $this->hasMany(Right::class, $this->primaryKey, $this->primaryKey);
    }
}
