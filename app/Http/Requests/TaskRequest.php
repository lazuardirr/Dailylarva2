<?php

namespace App\Http\Requests;

class TaskRequest extends Request
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
        if ($this->route()->getName() === 'dev.task.progress') {
            $rules = ['subtask' => 'required|min:1'];
        } else {
            $rules = [
                'task' => 'required',
                'status' => 'required',
                'subTask[]' => 'required',
            ];
        }
        return $rules;
    }
}
