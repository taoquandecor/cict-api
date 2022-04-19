<?php

namespace History\Models\Columns;

trait HistoryColumn
{
    public static $_All = 'tbHistory.*';
    public static $_Id = 'tbHistory.Id';
    public static $_EntityId = 'tbHistory.EntityId';
    public static $_AccountId = 'tbHistory.AccountId';
    public static $_HistoryId = 'tbHistory.HistoryId';
    public static $_ActivityTime = 'tbHistory.ActivityTime';
    public static $_PriorityOrder = 'tbHistory.PriorityOrder';
    public static $_Field = 'tbHistory.Field';
    public static $_FieldType = 'tbHistory.FieldType';
    public static $_OldValue = 'tbHistory.OldValue';
    public static $_NewValue = 'tbHistory.NewValue';
}
