<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

     public function authorize()
     {
         return true;
     }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'bio' => 'required|string|min:50',
            'nin' => 'required|string|min:10',
            'language' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
            'specialties' => 'array',
            'skills' => 'array',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.field_of_study' => 'nullable|string|max:255',
            'education.*.graduation_year' => 'nullable|date_format:Y',
            'videos.*.type' => 'required|in:youtube,uploaded',
            'videos.*.youtube_link' => 'nullable|required_if:videos.*.type,youtube|url',
            'videos.*.uploaded_video' => 'nullable|required_if:videos.*.type,uploaded|file|mimes:mp4,mkv|max:20480',
            'social_media' => 'array',
            'social_media.*' => 'nullable|url',
        ];
    }
}
