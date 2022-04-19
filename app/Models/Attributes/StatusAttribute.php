<?php

namespace App\Models\Attributes;

use App\General\Config;

trait StatusAttribute
{
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

    /**
     * @return bool
     */
    public function Active(): bool
    {
        return $this->Status == Config::ACTIVE;
    }
}
