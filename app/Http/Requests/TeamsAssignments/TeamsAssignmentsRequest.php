<?php

namespace App\Http\Requests\TeamsAssignments;

use Illuminate\Foundation\Http\FormRequest;

class TeamsAssignmentsRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'string'],
            'questions' => ['required'],
            'point' => ['required', 'numeric', 'digits_between:1,2'],
            'date' => ['required', 'date' ,'after_or_equal:now'],
        ];
    }
}
