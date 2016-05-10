<?php

namespace App\Http\Requests;


class TagCreateUpdateRequest extends Request
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
            'name' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a tag article from
     */
    public function tagFillData()
    {
        return [
            'name' => $this->name,
            'show_index' => $this->show_index == "yes",
        ];
    }
}
