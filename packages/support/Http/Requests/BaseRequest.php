<?php

namespace Support\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Response\Response;
use Support\Traits\Helpers;

class BaseRequest extends FormRequest
{
    use Helpers;

    public function rules()
    {
        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $response = app(Response::class);
        throw new HttpResponseException($response->ValidateRequestErrors($errors));
    }

    protected function failedAuthorization()
    {
        $response = app(Response::class);
        throw new HttpResponseException($response->NotFound());
    }

    public function render(){}

    protected function ValidNotFound($repo, $method, $merge, $id = null)
    {
        try {
            $id = is_null($id) ? $this->id : $id;
            $response = $repo->{$method}($id);
            request()->merge([$merge => $response]);

            return $response;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
