<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store_updateRequest extends FormRequest
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
            'prenom' => 'required|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'nom' => 'required|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'e_mail' => 'required|email',
            'nomE' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'adresse' => 'nullable|string',
            'postal_code' => 'nullable|numeric',
            'city' => 'nullable|string',
            'status' => 'in:LEAD,PROSPECT,CLIENT',
        ];
    }
    public function messages()
    {
        return [
            'prenom.required' => 'prenom is required!',
            'nom.required' => 'nom is required!',
            'e_mail.required' => 'e_mail is required!',
            'nomE.required' => 'entreprise is required!'
        ];
    }
}
