<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class QuyengopForm extends FormRequest
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
            'taikhoan' => 'required|regex:/^[0-9]*$/i|min:6|max:15',
            'ten' => 'max:255',
            'sotien' => 'required|numeric',
            'thoigian' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,svg|max:1024',
            'sdt' => new RequiredIf($this->sotien > 2000000),
        ];
    }
    
    public function attributes() 
    {
        return [
            'taikhoan' => "Tài khoản",
            'ten' => 'Họ tên',
            'sotien' => 'Số tiền',
            'thoigian' => 'Ngày đóng gớp',
            'image' => 'Chứng từ'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'taikhoan.regex' => "Số tài khoản không hợp lệ",
            'thoigian.required' => 'Vui lòng chọn :attribute',
            'thoigian.image' => 'Vui lòng chọn :attribute',
            'max'  => ':attribute phải có số ký tự nhỏ hơn bằng :max',
            'mimes'  => ':attribute là file ảnh có định đạng jpeg,png,jpg,gif,tiff,svg',
            'image.max' => ':attribute có kích thước phải nhỏ hơn bằng 1Mb',
            'image' => ':attribute có định dạng file ảnh',
            'sdt.required' => "Vui lòng cung cấp thêm số điện thoại hoặc email",
        ];
    }
}
