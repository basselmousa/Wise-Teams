<?php

namespace App\Http\Requests\Team;

use Illuminate\Foundation\Http\FormRequest;

class FindNewTeam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:30|min:2|string'
        ];
    }
}
