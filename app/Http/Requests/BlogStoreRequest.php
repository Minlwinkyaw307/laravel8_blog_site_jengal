<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title'                 => 'required|string|max:255',
            'content'               => 'required|string|max:10000',
            'thumbnail'             => 'required|image|file|max:512',
            'image'                 => 'required|image|file|max:5000',
            'category_id'           => 'required|exists:categories,id,deleted_at,NULL',
            'blog_status_id'        => 'required|exists:blog_statuses,id,deleted_at,NULL',
            'published_at'          => 'nullable|date|date_format:Y-m-d\TH:i',
            'is_featured'           => 'required|boolean',
        ];
    }
}
