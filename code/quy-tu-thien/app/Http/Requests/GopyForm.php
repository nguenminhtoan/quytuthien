<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GopyForm extends FormRequest
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
            'hoten' => 'max:255',
            'email' => 'email|nullable|max:255',
            'attach' => 'image|mimes:jpeg,png,jpg,gif,tiff,svg|max:1024',
            'noidung' => 'required|min:100|max:5000'
        ];
    }
    
    public function attributes() 
    {
        return [
            'hoten' => 'Họ tên',
            'email' => 'Email',
            'attach' => 'Tài liệu',
            'noidung' => 'Nội dung'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'email' => 'Địa chỉ email không hợp lệ',
            'max'  => ':attribute phải có số ký tự nhỏ hơn bằng :max',
            'min'  => ':attribute phải có số ký tự lớn hơn bằng :min',
            'mimes'  => ':attribute là file ảnh có định đạng jpeg,png,jpg,gif,tiff,svg',
            'image.max' => ':attribute có kích thước phải nhỏ hơn bằng 1Mb',
            'image' => ':attribute có định dạng file ảnh'
        ];
    }
}
