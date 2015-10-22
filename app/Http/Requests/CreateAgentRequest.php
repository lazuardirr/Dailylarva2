<?php

namespace App\Http\Requests;

class CreateAgentRequest extends Request
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
            'email' => 'required|email',
            'email_password' => 'required|min:8',
            'dailymotion_password' => 'required|min:8'
        ];
    }
}
