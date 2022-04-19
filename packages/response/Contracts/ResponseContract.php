<?php

namespace Response\Contracts;

use Illuminate\Http\JsonResponse;

interface ResponseContract
{
    /**
     * response get request success
     * @param array    $Data
     * @param string   $Message
     * @param int|null $Code
     * @return JsonResponse
     */
    public function Success(array $Data, string $Message = "", int $Code = null);

    /**
     * response not found error
     * @param $Message
     * @return JsonResponse
     */
    public function NotFound(string $Message = '');

    /**
     * response unauthorized error
     * @param $Message
     * @return JsonResponse
     */
    public function Unauthorized(string $Message = "");

    /**
     * return no role error
     * @param string $Message
     * @return JsonResponse
     */
    public function NoRoles(string $Message = '');

    /**
     * response server error
     * @param $Message
     * @return JsonResponse
     */
    public function ServerError(string $Message = '');

    /**
     * error token
     * @param string $Message
     * @return JsonResponse
     */
    public function TokenError(string $Message = '');

     /**
     * error when validate fail
     * @param array  $Errors
     * @param string $Code
     * @return JsonResponse
     */
    public function ValidateRequestErrors(array $Errors, string $Code = '');

    /**
     * error bad request
     * @param string $Message
     * @return JsonResponse
     */
    public function BadRequest(string $Message = '');

    /**
     * error
     * @param string $Message
     * @param        $Code
     * @return JsonResponse
     */
    public function Error(string $Message, int $Code);

    /**
     * force logout
     * @param string $Message
     * @return JsonResponse
     */
    public function ForceLogout(string $Message);
}
