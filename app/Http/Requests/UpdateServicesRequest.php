<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateServicesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=> [
                'string',
                'required',
            ],
            'duration'=> [
                'required',
                'integer',
            ],
            'price' => [
                'required',
                'integer'
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('task_access');
    }
}