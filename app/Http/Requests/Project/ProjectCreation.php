<?php

namespace DreamsArk\Http\Requests\Project;

use DreamsArk\Http\Requests\Request;

class ProjectCreation extends Request
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
            'title' => 'required',
            'amount' => 'required|integer|between:1,' . $this->user()->bag->coins,
            'budget' => 'required|integer',
            'end_date' => 'required|date'
        ];
    }
}