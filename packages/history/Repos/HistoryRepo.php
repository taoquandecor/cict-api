<?php

namespace History\Repos;

use App\Models\Account;
use History\General\Config;
use History\Models\History;
use Illuminate\Support\Facades\DB;
use Support\Repos\BaseRepo;

class HistoryRepo extends BaseRepo
{
    public function model()
    {
        return History::class;
    }

    public function GetHistoriesByEntities(array $ids)
    {
        $columns = [
            History::$_AccountId,
            History::$_ActivityTime,
            History::$_EntityId,
            Account::$_DisplayName,
            Account::$_Id,
        ];

        $query = $this->query()
            ->join(Account::$name, Account::$_Id, History::$_AccountId)
            ->select($columns)
            ->groupBy($columns)
            ->with(['Details' => function ($q) use ($ids) {
                $q->select([
                    DB::raw(sprintf("CASE %s %s %s %s %s ELSE NULL END AS OldValueName",
                        History::$_FieldType,
                        $this->GenerateDateTimeSelect(Config::DATETIME, History::$_OldValue),
                        $this->GenerateDateSelect(Config::DATE, History::$_OldValue),
                        $this->GenerateImageSelect(Config::IMAGE, '-'),
                        $this->GenerateJoinSelect(History::$_OldValue))),
                    DB::raw(sprintf("CASE %s %s %s %s %s ELSE NULL END AS NewValueName",
                        History::$_FieldType,
                        $this->GenerateDateTimeSelect(Config::DATETIME, History::$_NewValue),
                        $this->GenerateDateSelect(Config::DATE, History::$_NewValue),
                        $this->GenerateImageSelect(Config::IMAGE),
                        $this->GenerateJoinSelect(History::$_NewValue))),
                    History::$_ActivityTime,
                    History::$_Field,
                    History::$_FieldType,
                    History::$_OldValue,
                    History::$_NewValue,
                    History::$_AccountId,
                ])->whereIn(History::$_EntityId, $ids);
            }])
            ->whereIn(History::$_EntityId, $ids)
            ->orderByDesc(History::$_ActivityTime);

        return $query->paginate(Config::PER_PAGE);
    }

    public function GenerateJoinSelect($type)
    {
        $queryString = "";

        $maps = Config::QueryTypes();

        foreach ($maps as $key => $value) {
            list($table, $id, $display) = $value;

            $condition = array_key_exists(3, $value) ? $value[3] : '';

            $queryString = sprintf("%s %s", $queryString, $this->JoinQueryString($key, $table, $id, $display, $type, $condition));
        }

        return $queryString;
    }

    public function JoinQueryString($key, $table, $id, $display, $historyColumn, $condition)
    {
        return sprintf("WHEN %s THEN (SELECT CAST(%s AS NVARCHAR) + ';' FROM %s WHERE %s IN (SELECT Value FROM STRING_SPLIT(%s, ',')) %s FOR XML PATH(''))",
            $key,
            $display,
            $table,
            $id,
            $historyColumn,
            $condition
        );
    }

    public function GenerateDateTimeSelect($key, $historyColumn)
    {
        return sprintf("WHEN %s THEN SUBSTRING(COALESCE(%s, ''), 1, 16)", $key, $historyColumn);
    }

    public function GenerateDateSelect($key, $historyColumn)
    {
        return sprintf("WHEN %s THEN SUBSTRING(COALESCE(%s, ''), 1, 10)", $key, $historyColumn);
    }

    public function GenerateImageSelect($key, string $default = 'Changed')
    {
        return sprintf("WHEN %s THEN '%s'", $key, $default);
    }
}
