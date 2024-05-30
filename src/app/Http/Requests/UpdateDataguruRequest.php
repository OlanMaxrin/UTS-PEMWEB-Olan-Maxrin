<?php

namespace App\Http\Requests;

use App\Models\Dataguru;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDataguruRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dataguru_edit');
    }

    public function rules()
    {
        return [
            'umur' => [
                'string',
                'required',
            ],
            'masakerja' => [
                'string',
                'required',
            ],
            'jabatan' => [
                'string',
                'required',
            ],
        ];
    }
}
