<?php

namespace Response\Traits;

use Illuminate\Http\JsonResponse;

trait Helper
{
    /**
     * get output for response data
     * @param array $Data
     * @return \stdClass
     */
    private function ArrayToObject(array $Data = [])
    {
        $Response = new \stdClass();
        foreach ($Data as $Key => $Value) {
            $Response->{$Key} = $Value;
        }
        return $Response;
    }

    /**
     * get code for response data
     * @param int|null $Code
     * @return mixed
     */
    private function GetCode(int $Code = null)
    {
        return !is_null($Code) && is_int($Code) ? $Code : config('RESPONSE.MESSAGE_CODE.SUCCESS');
    }

    /**
     * return current server time with default format
     * @return string
     */
    private function GetServerTime()
    {
        return now()->format(config('RESPONSE.DATETIME.DEFAULT'));
    }

    /**
     * @param array $Response
     * @return JsonResponse
     */
    private function Response(array $Response = [])
    {
        return response()->json(
            $Response,
            config('RESPONSE.MESSAGE_CODE.SUCCESS'),
            config('RESPONSE.SETTING.CONTENT_TYPE'),
            JSON_UNESCAPED_UNICODE
        );
    }
}