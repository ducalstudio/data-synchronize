<?php

namespace Ducal\DataSynchronize\Http\Requests;

use Ducal\Support\Http\Requests\Request;

class ImportRequest extends Request
{
    public function rules(): array
    {
        return [
            'file_name' => ['required', 'string'],
            'offset' => ['required', 'integer'],
            'limit' => ['required', 'integer'],
            'total' => ['nullable', 'integer'],
        ];
    }
}
