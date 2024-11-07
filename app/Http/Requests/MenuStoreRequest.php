<?php

namespace App\Http\Requests;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MenuStoreRequest extends FormRequest
{
    public function authorize()
    {
        //create();

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
