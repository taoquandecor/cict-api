<?php

namespace App\General;

class Config
{
    const ACTIVE = 1;
    const BLOCKED = 2;
    const DELETED = 3;

    const MAX_ATTEMPTS = 10;
    const INCREASE_ATTEMPTS = 1;
    const REQUIRE_CHANGE_PASSWORD = 1;
    const PASSWORD_LENGTH = 10;
    const CLEAR_ATTEMPTS = 0;
    const SUPER_USER = 1;
    const NORMAL_USER = 2;
    const UNCHECK_VEHICLE_INSPECTION = 0;

    const TOKEN_ALIVE = 30; //minutes

    const DATE_DEFAULT = 'Y-m-d';
    const DATE_FULL = 'Y-m-d H:i:s';
    const TIME = 'H:i:s';
    const DATE_VOYAGE = 'yymd';

    const STATUS = [
        self::ACTIVE,
        self::BLOCKED,
        self::DELETED,
    ];

    const STATUS_LABELS = [
        self::ACTIVE  => 'Active',
        self::BLOCKED => 'Block',
        self::DELETED => 'Deleted',
    ];

    const COMMA = ',';
    const LOGIN = 1;
    const LOGOUT = 2;

    const DELETED_VALUE = 1;
    const DELETED_COLUMN = 'Deleted';
    const STATUS_COLUMN = 'Status';
    const SITE_COLUMN = 'SiteId';

    const STATUS_LC = [
        self::ACTIVE,
        self::BLOCKED,
    ];

    const LOADING = 1;
    const UNLOADING = 2;
    const STORAGE_IMPORT = 3;
    const STORAGE_EXPORT = 4;
    const SERVICE = 6;

    const CARGO_DIRECT = [
        self::LOADING        => 'XẾP HÀNG',
        self::UNLOADING      => 'DỠ HÀNG',
        self::STORAGE_IMPORT => 'NHẬP HÀNG',
        self::STORAGE_EXPORT => 'XUẤT HÀNG',
        self::SERVICE        => 'CÂN DỊCH VỤ',
    ];

    const MAX_BERTH = 10;

    const CODE_REGEX = '/^[A-Za-z0-9-.]+$/';

    const TEMP_FOLDER = 'temp';
}
