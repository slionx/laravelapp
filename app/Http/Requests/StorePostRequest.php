<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function messages() {
	    return [
		    'post_title.required'=>'标题不能为空',
		    'post_title.max'=>'标题最长不能超过255字符',
		    'post_slug.required'=>'slug不能为空',
		    'category.required'=>'分类不能为空',
		    'post_content.required'=>'内容不能为空',
	    ];
    }

	/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'post_title'   => 'required|unique:posts|max:255',
	        'post_slug'    => 'required',
	        'category'     => 'required',
	        'post_content' => 'required',
        ];
    }
}
