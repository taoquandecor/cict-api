<?php

namespace History\Entities;

class HistoryConfig
{
    private $MapColumns = [];
    private $IgnoreColumns = [];
    private $LabelColumns = [];
    private $ChangedDate;
    private $ChangedBy;
    private $HistoryField;
    private $Entity;
    private $Separator;
    private $KeyCompare;

    public function __construct($ChangedBy, $ChangedDate, $Entity, $MapColumns = [], $IgnoreColumns = [], $LabelColumns = [], $HistoryField = '', $Separator = '')
    {
        $this->MapColumns = $MapColumns;
        $this->IgnoreColumns = $IgnoreColumns;
        $this->LabelColumns = $LabelColumns;
        $this->ChangedDate = $ChangedDate;
        $this->ChangedBy = $ChangedBy;
        $this->Entity = $Entity;
        $this->HistoryField = $HistoryField;
        $this->Separator = empty($Separator) ? ',' : $Separator;
    }

    /**
     * @return array
     */
    public function GetMapColumns(): array
    {
        return $this->MapColumns;
    }

    /**
     * @return array
     */
    public function GetIgnoreColumns(): array
    {
        return $this->IgnoreColumns;
    }

    /**
     * @param array $columns
     * @return HistoryConfig
     */
    public function SetMapColumns(array $columns = []): HistoryConfig
    {
        $this->MapColumns = $columns;

        return $this;
    }

    /**
     * @param array $columns
     * @return HistoryConfig
     */
    public function SetIgnoreColumns(array $columns = []): HistoryConfig
    {
        $this->IgnoreColumns = $columns;

        return $this;
    }

    /**
     * @param null $key
     * @return array
     */
    public function GetLabelColumns($key = null): array
    {
        return $this->LabelColumns;
    }

    /**
     * @param array $columns
     * @return HistoryConfig
     */
    public function SetLabelColumn(array $columns): HistoryConfig
    {
        $this->LabelColumns = $columns;

        return $this;
    }

    /**
     * @return string
     */
    public function GetChangedDate(): string
    {
        return $this->ChangedDate;
    }

    /**
     * @param string $value
     * @return HistoryConfig
     */
    public function SetChangedDate(string $value): HistoryConfig
    {
        $this->ChangedDate = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function GetEntity(): string
    {
        return $this->Entity;
    }

    /**
     * @param string $entity
     * @return HistoryConfig
     */
    public function SetEntity(string $entity): HistoryConfig
    {
        $this->Entity = $entity;

        return $this;
    }

    /**
     * @return string
     */
    public function GetChangedBy(): string
    {
        return $this->ChangedBy;
    }

    /**
     * @param string $value
     * @return HistoryConfig
     */
    public function SetChangedBy(string $value): HistoryConfig
    {
        $this->ChangedBy = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function GetHistoryField(): string
    {
        return $this->HistoryField;
    }

    /**
     * @param string $HistoryField
     * @return HistoryConfig
     */
    public function SetHistoryField(string $HistoryField): HistoryConfig
    {
        $this->HistoryField = $HistoryField;

        return $this;
    }

    /**
     * @return string
     */
    public function GetSeparator(): string
    {
        return $this->Separator;
    }

    /**
     * @param string Separator
     * @return HistoryConfig
     */
    public function SetSeparator(string $Separator): HistoryConfig
    {
        $this->Separator = $Separator;

        return $this;
    }

    /**
     * @return string
     */
    public function GetKeyCompare(): string
    {
        return $this->KeyCompare;
    }

    /**
     * @param string $Key
     * @return HistoryConfig
     */
    public function SetKeyCompare($Key)
    {
        $this->KeyCompare = $Key;

        return $this;
    }
}
