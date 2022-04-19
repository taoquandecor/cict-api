<?php

namespace App\Models\Columns;

trait RoleColumn
{
    public static $_All = 'tbRole.*';
    public static $_Id = 'tbRole.Id';
    public static $_Code = 'tbRole.Code';
    public static $_DefaultRedirect = 'tbRole.DefaultRedirect';
    public static $_Level = 'tbRole.Level';
    public static $_DisplayName = 'tbRole.DisplayName';
    public static $_ChangedDate = 'tbRole.ChangedDate';
    public static $_ChangedBy = 'tbRole.ChangedBy';
}
