<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GayquyForm extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,tiff,svg|max:1024',
            'tenquy' => 'required|max:500',
            'batdau' => 'required',
            'ketthuc' => 'required',
            'phutrach' => 'required|max:255',
            'email' => 'required_without:sdt|email|nullable|max:255',
            'sdt' => 'required_without:email|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9|max:12',
            'diachi' => 'max:1000',
            'ghichi' => 'max:2000',
            'taikhoan.*.ma_taikhoan' => 'required|regex:/^[0-9]*$/i|min:6|max:15',
            'taikhoan.*.nganhang' => 'required',
            'taikhoan.*.hoten' => 'required',
        ];
        
    }

    public function attributes() 
    {
        return [
            'taikhoan.*.ma_taikhoan' => "Tài khoản",
            'taikhoan.*.nganhang' => 'Tên ngân hàng',
            'taikhoan.*.hoten' => 'Chủ sở hữu',
            'image' => 'Hình ảnh',
            'tenquy' => 'Tên quỹ',
            'batdau' => 'Ngày bắt đầu',
            'ketthuc' => 'Ngày kết thúc',
            'phutrach' => 'Họ tên',
            'email' => 'Email',
            'sdt' => 'Điện thoại',
            'diachi' => 'Địa chỉ',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'batdau.required' => 'Vui lòng chọn :attribute',
            'ketthuc.required' => 'Vui lòng chọn :attribute',
            'taikhoan.*.*.required' => 'Vui lòng nhập :attribute',
            'email' => 'Địa chỉ email không hợp lệ',
            'email.required' => 'Vui lòng nhập :attribute',
            'email.required_without' => ':attribute bắt buộc nhập nếu điện thoại không nhập',
            'sdt.regex' => 'Số điện thoại không hợp lệ',
            'sdt.required_without' => ':attribute bắt buộc nhập nếu email không nhập',
            'max'  => ':attribute phải có số ký tự nhỏ hơn bằng :max',
            'mimes'  => ':attribute là file ảnh có định đạng jpeg,png,jpg,gif,tiff,svg',
            'image.max' => ':attribute có kích thước phải nhỏ hơn bằng 1Mb',
            'image' => ':attribute có định dạng là file ảnh'
        ];
    }
}
