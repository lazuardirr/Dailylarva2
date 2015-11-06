<?php

namespace App\Http\Requests;

class MovieRequest extends Request
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
            'id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'genre' => 'required',
            'channel' => 'required',
            'country' => 'required',
            'language' => 'required',
        ];
    }
}
