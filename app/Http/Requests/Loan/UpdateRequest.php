<?php

namespace App\Http\Requests\Loan;

use App\Tag;
use App\Category;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'published_at' => ['required'],
            'category_id' => ['required'],
            'tags' => ['required'],
        ];
    }

}
