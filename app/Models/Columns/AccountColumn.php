<?php

namespace App\Models\Columns;

trait AccountColumn
{
    public static $_All = 'tbAccount.*';
    public static $_Id = 'tbAccount.Id';
    public static $_CategoryId = 'tbAccount.CategoryId';
    public static $_PartnerId = 'tbAccount.PartnerId';
    public static $_DepartmentId = 'tbAccount.DepartmentId';
    public static $_Status = 'tbAccount.Status';
    public static $_Code = 'tbAccount.Code';
    public static $_Password = 'tbAccount.Password';
    public static $_DisplayName = 'tbAccount.DisplayName';
    public static $_Email = 'tbAccount.Email';
    public static $_Email_CC = 'tbAccount.Email_CC';
    public static $_Phone = 'tbAccount.Phone';
    public static $_FailedLoginAttempts = 'tbAccount.FailedLoginAttempts';
    public static $_PasswordChangeDate = 'tbAccount.PasswordChangeDate';
    public static $_ForcePasswordChange = 'tbAccount.ForcePasswordChange';
    public static $_LoginStatus = 'tbAccount.LoginStatus';
    public static $_ChangedDate = 'tbAccount.ChangedDate';
    public static $_ChangedBy = 'tbAccount.ChangedBy';
    public static $_DefaultRedirect = 'tbAccount.DefaultRedirect';
    public static $_Super = 'tbAccount.Super';
    public static $_CreatedDate = 'tbAccount.CreatedDate';
    public static $_CreatedBy = 'tbAccount.CreatedBy';
    public static $_Deleted = 'tbAccount.Deleted';
}
