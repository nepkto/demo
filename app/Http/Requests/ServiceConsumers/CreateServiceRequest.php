<?php

namespace App\Http\Requests\ServiceConsumers;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('service_consumer')->id() === $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $services = Service::pluck('id');
       return [
           'service_id' => ['required', Rule::in($services)],
           'address' => ['bail','required', 'string', 'max:255'],
           'budget' => ['required', 'numeric'],
           'problem' => ['bail','required', 'string', 'max:255'],
           'description' => ['bail','required', 'string', 'max:1000'],
           'appointment_date' => ['required', 'date'],
           'longitude' => ['required'],
           'latitude'  => ['required'],
       ];
    }
}
