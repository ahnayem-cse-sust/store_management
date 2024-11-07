<?php

namespace App\Http\Requests;

use App\Income;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MenuUpdateRequest extends FormRequest
{
    public function authorize()
    {
       // edit();

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
