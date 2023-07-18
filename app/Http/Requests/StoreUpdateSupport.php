<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 255;
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
        $rules = [
            'subject' => [
                'required',
                'min:' . self::MIN_LENGTH,
                'max:' . self::MAX_LENGTH,
                'unique:supports'
            ],
            'body' => [
                'required',
                'min:' . self::MIN_LENGTH,
                'max:10000',

            ],
        ];

        if ($this->method() === 'PUT') {
            $rules['subject'] = [
                'required',
                'min:' . self::MIN_LENGTH,
                'max:' . self::MAX_LENGTH,
                // "unique:supports,subject,{$this->id},id"
                Rule::unique('supports')->ignore($this->id),
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'subject.required' => 'O campo "Assunto" é obrigatório.',
            'subject.min' => 'O Assunto deve ter no mínimo :min caracteres.',
            'subject.max' => 'O Assunto deve ter no máximo :max caracteres.',
            'subject.unique' => 'Já existe uma dúvida com esse nome [' . $this->subject  . '].
             Por favor, informe outro assunto.',
            'body.required' => 'O campo "Descrição" é obrigatório.',
            'body.min' => 'A Descrição deve ter no mínimo :min caracteres.',
            'body.max' => 'A Descrição deve ter no máximo :max caracteres.',
        ];
    }
}
