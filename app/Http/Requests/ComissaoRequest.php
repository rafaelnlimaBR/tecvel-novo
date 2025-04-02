<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComissaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fornecedor'  =>  ['required'],
            'valor'  =>  ['required', 'numeric', 'min:0'],
            'data'  =>  ['required', 'date', 'date_format:d/m/Y'],
//            'obs'   =>  ['nullable', 'string'],
        ];
    }
}
