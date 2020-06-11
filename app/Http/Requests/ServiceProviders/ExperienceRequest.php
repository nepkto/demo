<?php

namespace App\Http\Requests\ServiceProviders;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        return Auth::guard('service_provider')->id() === $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
           'title' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string', 'max:1000'],
       ];
    }
}
