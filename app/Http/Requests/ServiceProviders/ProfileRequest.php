<?php

namespace App\Http\Requests\ServiceConsumer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
           'address' => ['required', 'string', 'max:255'],
           'phone' => ['required','digits:10']
       ];
    }
}
