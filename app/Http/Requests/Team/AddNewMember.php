<?php

namespace App\Http\Requests\Team;

use App\Models\Team;
use Illuminate\Foundation\Http\FormRequest;

class AddNewMember extends FormRequest
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
            'username'=>'required|max:10|min:10|string'
        ];
    }
}
