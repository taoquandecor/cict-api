<?php

namespace History\General;

use App\Models\Category;
use App\Models\DeliveryDetail;
use App\Models\Organization;
use App\Models\SystemCode;
use App\Models\Vehicle;
use App\Models\Vessel;

class Config
{
    const PER_PAGE = 25;

    const CURRENCY = 92;
    const IMAGE = 93;
    const COLOR = 94;
    const TIME = 95;
    const SHOT_TIME = 96;
    const DATE = 97;
    const DATETIME = 98;
    const CHANGED = 99;

    const CATEGORY = 1;
    const ORGANIZATION = 2;
    const SYSTEM_CODE = 3;

    const TRUCK_PLATE = 4;
    const CHASSIS_PLATE = 5;

    public static function QueryTypes()
    {
        return [
            self::CATEGORY => [Category::$name, Category::$_Id, Category::$_DisplayName],
            self::ORGANIZATION => [Organization::$name, Organization::$_Id, Organization::$_FullName],
            self::SYSTEM_CODE => [SystemCode::$name, SystemCode::$_Id, SystemCode::$_Value1],
            self::TRUCK_PLATE => [Vehicle::$name, Vehicle::$_Id, Vehicle::$_Code],
            self::CHASSIS_PLATE => [Vehicle::$name, Vehicle::$_Id, Vehicle::$_Code],
        ];
    }
}
