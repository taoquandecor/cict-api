<?php

namespace App\Repos;

use App\General\Config;
use App\Traits\BySiteId;
use App\Traits\ConvertTypes;
use App\Traits\ExecuteStoreProcedure;
use App\Traits\FilterLike;
use App\Traits\FilterWhereIn;
use App\Traits\OrWhereId;
use App\Traits\SortBy;
use App\Traits\Pagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Support\Repos\BaseRepo as SupportRepo;


class BaseRepo extends SupportRepo
{
    use ConvertTypes, FilterLike, FilterWhereIn,Pagination, BySiteId, SortBy, ExecuteStoreProcedure, OrWhereId;

    protected $DeletedColumn = '', $SiteColumn = '';

    public function SoftDeleteBySites(array $values, array $sites = null, string $column = '')
    {
        $column = $this->GetColumn($column);
        $sites = !is_null($sites) ? $sites : $this->GetSiteId();

        $query = $this->query()->whereIn($column, $values);

        $query = $this->WhereNotDeleteRecords($query);

        $query = $this->WhereBySiteIds($query, $sites, Config::SITE_COLUMN);

        return $query->update([Config::DELETED_COLUMN => Config::DELETED_VALUE]);
    }

    public function FindBySites(string $id, array $sites = null)
    {
        $sites = !is_null($sites) ? $sites : $this->GetSiteId();

        $query = $this->WhereBySiteIds($this->query(), $sites, Config::SITE_COLUMN);

        $query = $this->WhereNotDeleteRecords($query);

        return $query->find($id);
    }

    public function WhereNotDeleteRecords($builder, ?string $column = ''): Builder
    {
        $column = empty($column) ? Config::DELETED_COLUMN : $column;
        return $builder->where($column, '!=', Config::DELETED_VALUE);
    }

    public function WhereActiveRecords(Builder $builder, ?string $column = '')
    {
        $column = empty($column) ? Config::STATUS_COLUMN : $column;
        return $builder->where($column, Config::ACTIVE);
    }

    public function WhereDate(
        Builder $builder,
        ?string $keyword,
        ?string $column = '',
        $operator = '>=',
        string $format = Config::DATE_DEFAULT
    ) {
        $data = $this->ConvertToDate($keyword, $format);

        if (empty($data)) {
            return $builder;
        }

        return $builder->where($column, $operator, $data);
    }

    public function GetListByTypes(array $types, string $column = '', string $siteColumn = Config::SITE_COLUMN)
    {
        if (empty($types) || empty($column)) {
            return [];
        }

        $query = $this->query()->whereIn($column, $types);

        $query = $this->WhereBySiteIds($query, $this->GetSiteId(), $siteColumn);

        $query = $this->WhereNotDeleteRecords($query);

        $query = $this->WhereActiveRecords($query);

        return $query->get();
    }

    public function ExecuteRawQuery(string $query)
    {
        return DB::select(DB::raw($query));
    }

    public function BaseQuery()
    {
        $query = $this->query();

        if (!empty($this->SiteColumn)) {
            $query = $this->WhereBySiteIds($query, $this->GetSiteId(), $this->SiteColumn);
        }

        if (!empty($this->DeletedColumn)) {
            $query = $this->WhereNotDeleteRecords($query, $this->DeletedColumn);
        }

        return $query;
    }
}
