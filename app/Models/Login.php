<?php

namespace App\Models;

use App\General\Config;
use App\Models\Columns\LoginColumn;
use Carbon\Carbon;
use Support\Models\BaseModel;
use Support\Traits\HasUuid;

/**
 * @property mixed ValidTo
 * @property mixed AccountId
 * @property mixed FacilityId
 * @property mixed Hash
 * @property mixed VGSAccountId
 * @property mixed CatalogRightValue
 * @property mixed Status
 * @property mixed Super
 * @property mixed Platform
 */
class Login extends BaseModel
{
    use HasUuid, LoginColumn;

    public $table = "tbLogin";

    public static $name = "tbLogin";

    protected $primaryKey = 'Id';

    protected $keyType = 'string';

    protected $casts = [
        'Id' => 'string'
    ];

    protected $fillable = [
        'Id',
        'AccountId',
        'Token',
        'ValidFrom',
        'SiteId',
        'ValidTo',
        'IP',
        'Agent',
        'Value',
    ];

    /**
     * @return bool
     * @throws \Exception
     */
    public function ValidDate()
    {
        return Carbon::parse($this->ValidTo)
            ->greaterThanOrEqualTo(Carbon::now());
    }

    /**
     * @return bool
     */
    public function IncreaseValidDate()
    {
        $this->ValidTo = Carbon::now()
            ->addMinutes(Config::TOKEN_ALIVE)
            ->format(Config::DATE_FULL);

        return $this->save();
    }

    /**
     * @return bool
     */
    public function Removed(): bool
    {
        return $this->Status == Config::DELETED;
    }

    /**
     * @return bool
     */
    public function Disabled(): bool
    {
        return $this->Status == Config::BLOCKED;
    }

//    public function ValidPlatform($platform): bool
//    {
//        return in_array($platform, explode(Config::COMMA, $this->Platform));
//    }
}
