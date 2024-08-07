<?php

namespace App\Http\Requests\Shipping;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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

            'code' => ['string',Rule::unique('shippings')->ignore($this->shipping->id)],
            'shipper' => ['string'],
            'image' => ['mimes:png,jpg,jpeg'],
            'weight' => ['integer'],
            'description' => ['string'],
            'status' => [Rule::in([0,1,2])]
        ];
    }
}
