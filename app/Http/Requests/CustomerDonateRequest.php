<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CustomerDonateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|numeric',
            'gender' => 'required|in:man,woman,other',
            'payment_mode' => 'required|in:visa,mastercard,amex',
            'card_number' => 'required',
            'expiration' => 'required',
            'cvn' => 'required|numeric',
            'donate_us' => 'required|numeric|between:10,1000',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        throw new HttpResponseException(response()->json([
            'message' => $errors,
            'code' => 402,
        ], 402));
    }
}
