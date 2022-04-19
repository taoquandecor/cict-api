<?php

namespace App\Models\Columns;

trait FeatureColumn
{
    public static $_All = 'tbFeature.*';
    public static $_Id = 'tbFeature.Id';
    public static $_Code = 'tbFeature.Code';
    public static $_DisplayName = 'tbFeature.DisplayName';
    public static $_RightValue = 'tbFeature.RightValue';
    public static $_GroupId = 'tbFeature.GroupId';
    public static $_Icon = 'tbFeature.Icon';
    public static $_Sort = 'tbFeature.Sort';
}
