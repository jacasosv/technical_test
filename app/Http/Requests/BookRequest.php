<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'  => [ "required", "min:5", "max:100"],
            'author' => [ "required", "min:5", "max:100"],
        ];
    }

    public function messages(): array
    {
        return [
            "title.required"  => __("books.title_required"),
            "title.min"       => __("books.title_min"),
            "title.max"       => __("books.title_max"),
            "author.required" => __("books.author_required"),
            "author.min"      => __("books.author_min"),
            "author.max"      => __("books.author_max"),
        ];
    }
}

