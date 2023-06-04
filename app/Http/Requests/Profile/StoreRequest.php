<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'location' => 'required',
            'short_intro' => 'required',
            'bio' => 'required',
            'profile_image' => 'required',
            'social_github' => 'required',
            'social_linkedin' => 'required',
            'social_twitter' => 'required',
            'social_youtube' => 'required',
        ];
    }
}
