<?php

namespace App\Http\Requests;

class IssueRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (isset($this->user()->id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'issue' => 'required|min:6',
            'detail' => 'required|min:6',
            'level' => 'required',
        ];
    }
}
