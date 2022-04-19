<?php

namespace Support\Repos;

use Prettus\Repository\Eloquent\BaseRepository;
use Support\Traits\Helpers;

class BaseRepo extends BaseRepository
{
    use Helpers;

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "";
    }

    public function query()
    {
        return $this->model->newQuery();
    }

    public function DeleteByIds(array $ids, string $column = '')
    {
        $column = empty($column) ? $this->model->getKeyName() : $column;

        return $this->query()->whereIn($column, $ids)->delete();
    }

    public function Insert($data = [])
    {
        return $this->model->newQuery()->insert($data);
    }

    public function GetByIds(array $ids, string $column = '')
    {
        return $this->query()->whereIn($this->GetColumn($column), $ids)->get();
    }

    public function FindWithRelation(string $id, array $relations, string $column = '')
    {
        return $this->query()->with($relations)->where($this->GetColumn($column), $id)->first();
    }

    protected function GetColumn(string $column = '')
    {
        return empty($column) ? $this->model->getKeyName() : $column;
    }
}
