<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogCommentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|max:75',
            'email'         => 'required|email:rfc,dns|max:75',
            'website'       => 'nullable|max:150|url',
            'comment'       => 'required|string|max:1000',
            'blog_id'       => 'required|numeric|exists:blogs,id,deleted_at,NULL'
        ];
    }
}
