<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:posts,title,' . $this->route('post'),
            'body' => 'required|string|min:10',
            'is_published' => 'nullable|boolean',
        ];
    }
}
