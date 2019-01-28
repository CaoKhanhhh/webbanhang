<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'customer_name' => 'required|max:30',
            'customer_email' => 'required|email',
            'customer_phone_number' => 'required',
            'customer_address' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'Vui lòng nhập họ tên ',
            'customer_name.max' => 'Độ dài không vượt quá 30 ký tự',
            'customer_email.required' =>'Vui lòng nhập email',
            'customer_phone_number.required' =>'Vui lòng nhập số điện thoại ',
            'customer_address.required' =>'Vui lòng nhập địa chỉ'
        ];
    }
}
