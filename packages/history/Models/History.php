<?php

namespace History\Models;

use History\Models\Columns\HistoryColumn;
use Support\Models\BaseModel;
use Awobaz\Compoships\Compoships;

class History extends BaseModel
{
    use HistoryColumn, Compoships;

    public $table = 'tbHistory';

    public static $name = 'tbHistory';

    public static $ActivityTime = 'ActivityTime';

    public static $AccountId = 'AccountId';

    protected $fillable = [
        'EntityId',
        'ActivityTime',
        'PriorityOrder',
        'Field',
        'FieldType',
        'OldValue',
        'NewValue',
        'AccountId',
    ];

    public function Details()
    {
        return $this->hasMany(History::class, [History::$ActivityTime, History::$AccountId], [History::$ActivityTime, History::$AccountId]);
    }
}
