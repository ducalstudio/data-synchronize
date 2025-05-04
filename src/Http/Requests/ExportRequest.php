<?php

namespace Ducal\DataSynchronize\Http\Requests;

use Ducal\Support\Http\Requests\Request;

class ExportRequest extends Request
{
    public function rules(): array
    {
        return [
            'format' => ['required', 'string', 'in:csv,xlsx'],
            'columns' => ['nullable', 'array'],
            'columns.*' => ['required', 'string'],
        ];
    }
}
