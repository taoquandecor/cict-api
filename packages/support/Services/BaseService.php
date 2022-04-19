<?php

namespace Support\Services;

use App\General\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Response\Response;
use Support\Traits\Helpers;

class BaseService
{
    use Helpers;

    protected $response, $baseRepo, $baseResponse;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function BaseIndex(array $response = [])
    {
        try {
            $response = array_merge($response, [$this->baseResponse => $this->baseRepo->Search()]);
            return $this->response->Success($response);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

    public function BaseCreate(array $response = [])
    {
        try {
            return $this->response->Success($response);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

    public function BaseDelete($ids)
    {
        try {
            $ids = explode(Config::COMMA, $ids);

            if (count($ids) <= 0) {
                return $this->response->BadRequest(__("No element was selected"));
            }

            $this->baseRepo->SoftDeleteBySites($ids);

            return $this->response->Success(['Msg' => __("Operation was successful")]);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

    public function BaseUpdate(array $data, string $id)
    {
        try {
            $response = $this->baseRepo->update($data, $id);

            return $this->response->Success([
                $this->baseResponse => $response,
                'Msg'               => __("Operation was successful"),
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

    public function BaseEdit(string $id, array $response = [])
    {
        try {
            if (!$edit = $this->baseRepo->FindBySites($id)) {
                return $this->response->NotFound();
            }

            $response = array_merge($response, [$this->baseResponse => $edit]);

            return $this->response->Success($response);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }

    public function BaseStore(array $data)
    {
        try {
            $store = $this->baseRepo->create($data);

            return $this->response->Success([
                $this->baseResponse => $store,
                'Msg'               => __("Operation was successful"),
            ]);
        } catch (\Exception $ex) {
            return $this->response->ServerError($ex->getMessage());
        }
    }
}
