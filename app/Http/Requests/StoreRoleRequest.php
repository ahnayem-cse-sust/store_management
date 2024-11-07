<?php

namespace App\Http\Requests;

use App\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        create();

        return true;
    }

    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            'permission_id.*' => [
                'integer',
            ],
            'permission_id'   => [
                'required',
                'array',
            ],
        ];
    }
}
