<?php

namespace History\Traits;

use History\Entities\HistoryConfig;
use History\Entities\HistoryEntity;
use History\Events\HistoryEvent;
use History\Helpers\ArrayComparator;
use Illuminate\Support\Facades\Log;

trait MultipleManualHistories
{
    public static function MultipleManualHistories(string $id, array $newValues, string $column, array $select)
    {
        try {
            $self = (new self);

            $options = $self->HistoryOptions();

            $records = $self->GetManualHistories($id, $options, $newValues, $column, $select);

            if (empty($records)) return;

            HistoryEvent::dispatch($records);
        } catch (\Exception $e) {
            Log::info("Manual Histories: " . $e->getMessage());
        }
    }

    protected function GetManualHistories(string $id, HistoryConfig $config, array $newValues, $column, $select): array
    {
        $oldValues = $this->GetOldValueByID($id, $column, $select);

        return $this->GetDifferenceOldAndNew($config, $oldValues, $newValues, $id);
    }

    private function GetOldValueByID($id, $key, $select)
    {
        return $this->newQuery()
            ->where(empty($key) ? $this->getKeyName() : $key, $id)
            ->select($select)
            ->get()
            ->toArray();
    }

    private function GetDifferenceOldAndNew(HistoryConfig $config, $oldValues, $newValues, $id)
    {
        $key = $config->GetKeyCompare();
        $records = [];

        foreach ($oldValues as $value1) {
            if (!isset($value1[$key])) continue;

            $obj1 = $value1;
            $obj2 = null;
            foreach ($newValues as $value2) {
                if (isset($value2[$key]) && $value2[$key] == $value1[$key]) {
                    $obj2 = $value2;

                    break;
                }
            }

            $diffs = ArrayComparator::Diff($obj1, $obj2);

            foreach ($diffs as $field => $diff) {
                if (in_array($field, $config->GetIgnoreColumns())) continue;

                $history = new HistoryEntity();

                $records[] = $history
                    ->SetActivityTime($config->GetChangedDate())
                    ->SetOldValue($diff['OldValue'])
                    ->SetNewValue($diff['NewValue'])
                    ->SetEntityId($id)
                    ->SetAccountId($config->GetChangedBy())
                    ->SetField($this->SetLabel($config, $field) . " ($value1[$key])")
                    ->ToArray();
            }
        }

        return $records;
    }

    private function SetLabel(HistoryConfig $config, $key)
    {
        $columns = $config->GetLabelColumns();

        return empty($columns) || !isset($columns[$key]) ? $key : $columns[$key];
    }
}
