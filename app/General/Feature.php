<?php

namespace App\General;

class Feature
{
    const PORTAL = 1;
    const MOBILE = 2;

    const APPLICATIONS = [
        self::PORTAL => 'Web Portal',
        self::MOBILE => 'App Mobile',
    ];
}
