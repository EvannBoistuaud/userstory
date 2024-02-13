<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordonneeBancaireRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'date_expiration' => 'required|regex:/^\d{2}\/\d{2}$/',
            'numero_carte' => ['required', 'regex:/^[0-9]{16}$/'],
            'code_securite' => ['required', 'digits:3'],
            'expiration' => ['required', 'regex:/^(0[1-9]|1[0-2])\/[0-9]{2}$/'],
        ];
    }
    public function messages()
    {
        return [
            'numero.required' => 'Le numéro de carte est requis.',
            'numero.regex' => 'Le numéro de carte doit contenir exactement 16 chiffres.',
            'code_securite.required' => 'Le code de sécurité est requis.',
            'code_securite.digits' => 'Le code de sécurité doit contenir exactement 3 chiffres.',
            'expiration.required' => 'La date d\'expiration est requise.',
            'expiration.regex' => 'Le format de la date d\'expiration doit être MM/YY.',
        ];
    }
}
