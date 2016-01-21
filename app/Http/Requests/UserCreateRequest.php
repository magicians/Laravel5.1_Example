<?php

namespace App\Http\Requests;

class UserCreateRequest extends Request
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
            'name' => 'max:30|unique:users,name',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function userFillData()
    {
        return [
            'name' => $this->name,
            'password' => bcrypt($this->password),
            'is_admin' => (boolean)$this->is_admin,
        ];
    }
}
