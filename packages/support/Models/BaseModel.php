<?php

namespace Support\Models;

use History\Entities\HistoryConfig;
use Illuminate\Database\Eloquent\Model;
use Support\Traits\Helpers;

class BaseModel extends Model
{
    use Helpers;

    public $timestamps = false;

    public $incrementing = false;

    public function HistoryOptions(): HistoryConfig
    {
        return new HistoryConfig(
            $this->GetLogin()->AccountId,
            $this->Now(),
            '',
            [],
            [
                'ChangedDate',
                'ChangedBy',
                'ID',
            ]);
    }
}
