<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $roles = [
            'name' => 'required|unique:departments',
            'display_name' => 'required',
            'description' => 'sometimes'
        ];

        return $roles;
    }

}
