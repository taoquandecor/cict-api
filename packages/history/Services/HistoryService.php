<?php

namespace History\Services;

use History\Repos\HistoryRepo;
use Support\Services\BaseService;

class HistoryService extends BaseService
{
    public function __construct(HistoryRepo $repo)
    {
        parent::__construct();

        $this->baseRepo = $repo;
    }

    public function Index($ids)
    {
        try {
            return $this->response->Success(['Histories' => $this->baseRepo->GetHistoriesByEntities(explode(',', $ids))]);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
