<?php

namespace Support\General;

class Config
{
    public const AUTH_KEY = 'Authorization';
    public const AUTH_PREFIX = 'Bearer ';
    public const DEFAULT_DATETIME_FORMAT = 'Y/m/d H:i:s';
    public const SECOND_DATETIME_FORMAT = 'Y-m-d H:i:s';
    public const DEFAULT_DATE_FORMAT = 'Y/m/d';
    public const DEFAULT_TIME_FORMAT = 'H:i:s';
    public const YEAR_MONTH = 'Y-m';
    public const MONTH_YEAR = 'm-Y';
    public const PER_PAGE = 25;
    public const RANDOM_NAME = 16;
    public const TOKEN_LENGTH = 32;
    public const UUID_REGEX = '/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i';
    const ADMIN_LOGIN = 'AdminLogin';
}
