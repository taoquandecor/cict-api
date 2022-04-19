<?php

namespace App\Models\Columns;

trait LoginColumn
{
    public static $_All = 'tbLogin.*';
    public static $_Id = 'tbLogin.Id';
    public static $_AccountId = 'tbLogin.AccountId';
    public static $_Token = 'tbLogin.Token';
    public static $_ValidFrom = 'tbLogin.ValidFrom';
    public static $_ValidTo = 'tbLogin.ValidTo';
    public static $_IP = 'tbLogin.IP';
    public static $_Agent = 'tbLogin.Agent';
    public static $_Value = 'tbLogin.Value';
    public static $_SiteId = 'tbLogin.SiteId';
}
