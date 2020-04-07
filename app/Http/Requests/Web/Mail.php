<?php

namespace Unic\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class Mail extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'email' => 'required|email',
            'subject' => 'required',
            'bodyMessage' => 'required|min:5'
        ];
    }
}
