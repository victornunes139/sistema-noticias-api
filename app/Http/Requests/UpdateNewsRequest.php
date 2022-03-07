<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|min:5|max:150',
            'caption' => 'string|min:5|max:150',
            'body' => 'string',
            'type_id' => 'exists:App\Models\NewsType,id',
            'media' => 'nullable|url'
        ];
    }
}
