<?php

namespace App\Http\Requests\Trafic;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
            'latitude' => 'required|max:44';
            'longitude' => 'required|max:44';
            'incidentCategory' => 'required|int',
        ];
    }
}
