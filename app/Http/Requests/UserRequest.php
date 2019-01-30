<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:30',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên ',
            'name.max' => 'Độ dài không vượt quá 30 ký tự',
            'email.required' =>'Vui lòng nhập email',
            'address.required' =>'Vui lòng nhập địa chỉ',
            'phone_number.required' =>'Vui lòng nhập số điện thoại '
        ];
    }
}
