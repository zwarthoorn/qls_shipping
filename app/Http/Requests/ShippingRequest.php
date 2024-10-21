<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShippingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to false if you need to implement authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            // Billing Address
            'billingName' => 'required|string|max:40',
            'billingStreet' => 'required|string|max:255',
            'billingHouseNumber' => 'required|string|max:50',
            'billingZipcode' => 'required|string|max:6',
            'billingCity' => 'required|string|max:40',
            'billingCountry' => 'required|string|max:30',
            'billingEmail' => 'required|email|max:255',
            'billingPhone' => 'required|string|max:20',

            // Delivery Address
            'deliveryName' => 'required|string|max:40',
            'deliveryStreet' => 'required|string|max:255',
            'deliveryHouseNumber' => 'required|string|max:50',
            'deliveryZipcode' => 'required|string|max:6',
            'deliveryCity' => 'required|string|max:40',
            'deliveryCountry' => 'required|string|max:30',

            // Product
            'selectedProductId' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid email address.',
            'max' => 'The :attribute may not be greater than :max characters.',
            'exists' => 'The selected :attribute is invalid.',
        ];
    }
}
