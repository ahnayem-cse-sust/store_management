<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelStoreRequest extends FormRequest
{
    public function authorize()
    {
        create();

        return true;
    }

    public function rules()
    {
        return [];
    }
}