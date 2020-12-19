<?php

namespace App\Http\Requests\TeamsAssignments;

use Illuminate\Foundation\Http\FormRequest;

class UploadAssignmentRequest extends FormRequest
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
            'assignment' => ['file','mimes:doc,docx,ppt,pptx']
        ];
    }
}
