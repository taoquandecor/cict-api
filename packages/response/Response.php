<?php

namespace Response;

use Illuminate\Http\JsonResponse;
use Response\Contracts\ResponseContract;
use Response\Traits\Helper;

class Response implements ResponseContract
{
    use Helper;

    /**
     * response get request success
     * @param array    $Data
     * @param string   $Message
     * @param int|null $Code
     * @return JsonResponse
     */
    public function Success(array $Data, string $Message = "", int $Code = null)
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => $this->GetCode($Code),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.MESSAGE')     => empty($Message) ? __('Successful') : $Message,
            config('RESPONSE.CAPTIONS.DATA')        => $this->ArrayToObject($Data)
        ];
        return $this->Response($Response);
    }

    /**
     * response not found error
     * @param $Message
     * @return JsonResponse
     */
    public function NotFound(string $Message = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.NOT_FOUND'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => empty($Message) ? __("Not Found") : $Message
        ];
        return $this->Response($Response);
    }

    /**
     * response unauthorized error
     * @param $Message
     * @return JsonResponse
     */
    public function Unauthorized(string $Message = "")
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.UNAUTHORIZED'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => empty($Message) ? __("Unauthorized") : $Message
        ];
        return $this->Response($Response);
    }

    /**
     * return no role error
     * @param string $Message
     * @return JsonResponse
     */
    public function NoRoles(string $Message = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.FORBIDDEN'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => empty($Message) ? __("No Roles") : $Message
        ];
        return $this->Response($Response);
    }

    /**
     * response server error
     * @param $Message
     * @return JsonResponse
     */
    public function ServerError(string $Message = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.SERVER_ERROR'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => empty($Message) ? __("Operation Failed") : $Message
        ];
        return $this->Response($Response);
    }

    /**
     * error token
     * @param string $Message
     * @return JsonResponse
     */
    public function TokenError(string $Message = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.VALIDATE_CODE'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => empty($Message) ? __("Token Required") : $Message
        ];
        return $this->Response($Response);
    }

    /**
     * error when validate fail
     * @param array  $Errors
     * @param string $Code
     * @return JsonResponse
     */
    public function ValidateRequestErrors(array $Errors, string $Code = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => empty($Code) ? config('RESPONSE.MESSAGE_CODE.VALIDATE_CODE') : $Code,
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => $Errors
        ];
        return $this->Response($Response);
    }

    /**
     * error bad request
     * @param string $Message
     * @return JsonResponse
     */
    public function BadRequest(string $Message = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.BAD_REQUEST'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => $Message
        ];
        return $this->Response($Response);
    }

    /**
     * error
     * @param string $Message
     * @param        $Code
     * @return JsonResponse
     */
    public function Error(string $Message, int $Code)
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => $Code,
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => $Message
        ];
        return $this->Response($Response);
    }

    public function ForceLogout(string $Message = '')
    {
        $Response = [
            config('RESPONSE.CAPTIONS.CODE')        => config('RESPONSE.MESSAGE_CODE.FORCE_LOGOUT'),
            config('RESPONSE.CAPTIONS.SERVER_TIME') => $this->GetServerTime(),
            config('RESPONSE.CAPTIONS.ERRORS')      => empty($Message) ? __("Force Logout") : $Message
        ];
        return $this->Response($Response);
    }
}
