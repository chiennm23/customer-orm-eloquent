<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
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
            'email' => 'required|email|unique:customers,email',
            'dob' => 'required|after:today',
            'city_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng "abc@xyz.ijk" !',
            'email.unique' => 'Email đã tồn tại',
            'dob.required' => 'Ngày sinh không được để trống!',
            'dob.after' => 'Ngày sinh của bạn có vấn đề',
            'city_id.required' => 'Thành phố không được để trống'
        ];
    }
}
