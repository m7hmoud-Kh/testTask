<?php

namespace App\Http\Requests\Journal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJournalRequest extends FormRequest
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
            'shipping_id' => ['required','exists:shippings,id'],
            'type' => ['required',Rule::in(['Debit Cash','Credit Revenue','Credit Payable'])]
        ];
    }
}
