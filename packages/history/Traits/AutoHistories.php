<?php

namespace History\Traits;

use History\General\Config;
use Carbon\Carbon;
use History\Entities\HistoryConfig;
use History\Entities\HistoryEntity;
use History\Events\HistoryEvent;
use History\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait AutoHistories
{
    protected static function bootAutoHistories()
    {
        self::updating(function (Model $model) {
            try {
                $self = (new self);

                $options = $self->HistoryOptions();

                $records = $self->GetAutoHistories($model, $options);

                if (empty($records)) return;

                HistoryEvent::dispatch($records);
            } catch (\Exception $e) {
                Log::error($e);
            }
        });
    }

    protected function GetAutoHistories(Model $model, HistoryConfig $config): array
    {
        $records = [];

        $origin = $model->getOriginal();

        foreach ($model->getDirty() as $key => $newValue) {
            if ($this->ByPassValue($origin, $key, $newValue, $config)) continue;

            $oldValue = $origin[$key] ?? null;

            $history = new HistoryEntity();

            $history = $history
                ->SetActivityTime($config->GetChangedDate())
                ->SetEntityId($this->SetEntity($model, $config))
                ->SetAccountId($config->GetChangedBy())
                ->SetField((string)$this->SetLabel($config, $key));

            $fieldType = isset($config->GetMapColumns()[$key]) ? $config->GetMapColumns()[$key] : null;

            if (is_array($fieldType) && !is_null($fieldType)) {
                $newValue = $this->RemapArrayFieldType($config, $fieldType, $newValue);
                $oldValue = $this->RemapArrayFieldType($config, $fieldType, $oldValue);

                $records[] = $history->SetFieldType(null)
                    ->SetOldValue((string)$oldValue)
                    ->SetNewValue((string)$newValue)
                    ->ToArray();

                continue;
            }

            $records[] = $history->SetFieldType($fieldType)
                ->SetOldValue((string)$oldValue)
                ->SetNewValue((string)$newValue)
                ->ToArray();
        }

        return $records;
    }

    protected function RemapArrayFieldType(HistoryConfig $config, $fieldType, $value)
    {
        if (is_null($value)) return null;

        $display = '';

        foreach (explode($config->GetSeparator(), $value) as $item) {
            if (!isset($fieldType[$item])) {
                continue;
            }
            $display = sprintf("$display%s%s", $fieldType[$item], $config->GetSeparator());
        }

        return !empty($display) ? substr($display, 0, strlen($display) - 1) : null;
    }

    private function SetEntity(Model $model, HistoryConfig $config) : string
    {
        return empty($config->GetEntity()) ? $model->{$model->getKeyName()} : $model->{$config->GetEntity()};
    }

    private function SetLabel(HistoryConfig $config, $key)
    {
        $columns = $config->GetLabelColumns();

        return empty($columns) || !isset($columns[$key]) ? $key : $columns[$key];
    }

    private function ByPassValue($origin, $key, $newValue, HistoryConfig $config)
    {
        $same = $origin[$key] && $origin[$key] == $newValue;

        if ($same || in_array($key, $config->GetIgnoreColumns())) return true;

        $oldValue = $origin[$key];

        $fieldType = isset($config->GetMapColumns()[$key]) ? $config->GetMapColumns()[$key] : null;

        if (is_null($fieldType) || is_null($oldValue) || is_null($newValue)) return false;

        if ($fieldType == Config::DATETIME) {
            $oldValue = Carbon::parse($oldValue)->format('Y-m-d H:i:s');
            $newValue = Carbon::parse($newValue)->format('Y-m-d H:i:s');
        }

        if ($fieldType == Config::DATE) {
            $oldValue = Carbon::parse($oldValue)->format('Y-m-d');
            $newValue = Carbon::parse($newValue)->format('Y-m-d');
        }

        if ($fieldType == Config::TIME) {
            $oldValue = substr($oldValue, 0, 8);
            $newValue = substr($newValue, 0, 8);
        }

        if ($fieldType == Config::SHOT_TIME) {
            $oldValue = substr($oldValue, 0, 5);
            $newValue = substr($newValue, 0, 5);
        }

        return $oldValue == $newValue;
    }
}
