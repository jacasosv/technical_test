<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email'   => [ "required", "email"],
            'message' => [ "required", "min:50", "max:400"],
        ];
    }

    public function messages(): array
    {
        return [
            "email.required"   => __("contact.email_required"),
            "email.email"      => __("contact.email_check"),
            "message.required" => __("contact.message_required"),
            "message.min"      => __("contact.message_min"),
            "message.max"      => __("contact.message_max"),
        ];
    }
}
