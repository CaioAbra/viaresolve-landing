<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'min:2', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['required', 'string', 'min:10', 'max:20'],
            'problem' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Por favor, informe seu nome.',
            'name.min'       => 'O nome deve ter pelo menos 2 caracteres.',
            'email.required' => 'Por favor, informe seu e-mail.',
            'email.email'    => 'Informe um e-mail válido.',
            'phone.required' => 'Por favor, informe seu telefone.',
            'phone.min'      => 'Telefone inválido.',
        ];
    }
}
