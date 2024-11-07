<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerMassDestroyRequest extends FormRequest
{
    public function authorize()
    {
        delete();

        return true;
    }

    public function rules()
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'exists:menufacturers,id',
        ];
    }
}
