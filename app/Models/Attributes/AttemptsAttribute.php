<?php

namespace App\Models\Attributes;

use App\General\Config;

trait AttemptsAttribute
{
    /**
     * @return bool
     */
    public function MaxAttempts(): bool
    {
        return $this->FailedLoginAttempts >= Config::MAX_ATTEMPTS;
    }

    /**
     * lock account
     * @return bool
     */
    public function Lock(): bool
    {
        return $this->Status = Config::BLOCKED && $this->save();
    }

    /**
     * increase login failed attempts
     */
    public function IncreaseAttempts(): bool
    {
        $this->FailedLoginAttempts += Config::INCREASE_ATTEMPTS;
        return $this->save();
    }

    /**
     * clear login failed
     * @return mixed
     */
    public function ClearAttempts(): bool
    {
        return $this->FailedLoginAttempts = Config::CLEAR_ATTEMPTS && $this->save();
    }
}
