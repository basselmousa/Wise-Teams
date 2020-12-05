<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id == \request()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
            'status' => ['required'],
            'fullname' => ['required', 'string', 'min:8', 'max:255'],
            'gender' => ['required'],
            'specialization' => ['required', 'string','max:30'],
        ];
    }
}
