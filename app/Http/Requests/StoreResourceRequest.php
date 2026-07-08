<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
{
    /**
     * Determine if the authenticated user
     * can make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            'category_id' => [
                'nullable',
                'exists:categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'type' => [
                'required',
                'in:article,youtube,pdf,note',
            ],

            'source_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'content' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                'in:unread,reading,completed',
            ],

            'is_favorite' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}
