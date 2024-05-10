<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransporterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state_code' => ['required', 'string', 'max:2'],
            'credit_limit' => ['required', 'numeric'],
            'credit_analysis_date' => ['required', 'date'],
        ];
    }
}
