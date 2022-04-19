<?php

namespace History\Traits;

use History\Entities\HistoryConfig;
use History\Entities\HistoryEntity;
use History\Events\HistoryEvent;
use Illuminate\Support\Facades\Log;

trait SingleManualHistories
{
    public static function SingleManualHistories(string $id, array $newValue, string $key, string $column)
    {
        try {
            $self = (new self);

            $options = $self->HistoryOptions();

            $records = $self->GetManualHistories($id, $newValue, $key, $column, $options);

            if (empty($records)) return;

            HistoryEvent::dispatch($records);
        } catch (\Exception $e) {
            Log::info("Manual Histories: " . json_encode($e));
        }
    }

    protected function GetManualHistories(string $id, array $newValue, string $key, string $column, HistoryConfig $config): array
    {
        $newValue = array_change_key_case(array_flip($newValue));

        $oldValue = array_change_key_case(array_flip($this->GetOldValueByID($id, $column, $key)));

        return $this->IsValueChanged($oldValue, $newValue) ? $this->GetManualHistoryDetail($config, $id, $newValue, $oldValue) : [];
    }

    private function GetOldValueByID($id, $column, $key = '')
    {
        return $this->newQuery()
            ->where(empty($key) ? $this->getKeyName() : $key, $id)
            ->pluck($column)
            ->all();
    }

    private function IsValueChanged($old, $new)
    {
        if (count($old) != count($new)) return true;

        return count(array_diff_key($old, $new)) > 0;
    }

    private function GetManualHistoryDetail(HistoryConfig $config, $id, $newValue, $oldValue) : array
    {
        $field = $config->GetHistoryField();

        return (new HistoryEntity())
            ->SetField($config->GetHistoryField())
            ->SetFieldType(isset($config->GetMapColumns()[$field]) ? $config->GetMapColumns()[$field] : null)
            ->SetActivityTime($config->GetChangedDate())
            ->SetEntityId($id)
            ->SetAccountId($config->GetChangedBy())
            ->SetNewValue(empty($newValue) ? null : implode(',', array_keys($newValue)))
            ->SetOldValue(empty($oldValue) ? null : implode(',', array_keys($oldValue)))
            ->ToArray();
    }
}
