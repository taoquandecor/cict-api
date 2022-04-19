<?php

namespace History\Entities;

class HistoryEntity
{
    public $EntityId;
    public $ActivityTime;
    public $Field;
    public $FieldType = null;
    public $OldValue;
    public $NewValue;
    public $AccountId;

    /**
     * @return mixed
     */
    public function GetEntityId()
    {
        return $this->EntityId;
    }

    /**
     * @param mixed $EntityId
     * @@return HistoryEntity
     */
    public function SetEntityId($EntityId): HistoryEntity
    {
        $this->EntityId = $EntityId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GetActivityTime()
    {
        return $this->ActivityTime;
    }

    /**
     * @param mixed $ActivityTime
     * @@return HistoryEntity
     */
    public function SetActivityTime($ActivityTime): HistoryEntity
    {
        $this->ActivityTime = $ActivityTime;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GetField()
    {
        return $this->Field;
    }

    /**
     * @param mixed $Field
     * @@return HistoryEntity
     */
    public function SetField($Field): HistoryEntity
    {
        $this->Field = $Field;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GetFieldType()
    {
        return $this->FieldType;
    }

    /**
     * @param mixed $FieldType
     * @@return HistoryEntity
     */
    public function SetFieldType($FieldType): HistoryEntity
    {
        $this->FieldType = $FieldType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GetOldValue()
    {
        return $this->OldValue;
    }

    /**
     * @param mixed $OldValue
     * @@return HistoryEntity
     */
    public function SetOldValue($OldValue): HistoryEntity
    {
        $this->OldValue = $OldValue;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GetNewValue()
    {
        return $this->NewValue;
    }

    /**
     * @param mixed $NewValue
     * @@return HistoryEntity
     */
    public function SetNewValue($NewValue): HistoryEntity
    {
        $this->NewValue = $NewValue;

        return $this;
    }

    /**
     * @return HistoryEntity
     */
    public function UnsetFieldType(): HistoryEntity
    {
        unset($this->FieldType);

        return $this;
    }

    /**
     * @param mixed PermissionLoginID
     * @return HistoryEntity
     */
    public function SetAccountId($AccountId): HistoryEntity
    {
        $this->AccountId = $AccountId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GetAccountId()
    {
        return $this->AccountId;
    }

    public function ToArray()
    {
        return [
            'EntityId'     => $this->EntityId,
            'ActivityTime' => $this->ActivityTime,
            'Field'        => $this->Field,
            'FieldType'    => $this->FieldType,
            'OldValue'     => $this->OldValue,
            'NewValue'     => $this->NewValue,
            'AccountId'    => $this->AccountId,
        ];
    }
}
