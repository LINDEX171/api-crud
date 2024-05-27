<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditPostRequest extends FormRequest
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
            'titre' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        //throw : Utilisé pour lancer une exception en PHP.
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'error'=>true,
            'message'=>'Erreur de valdation',
            'errorsList'=>$validator->errors(),
        ]));
    }

    public function messages()
    {
        return [
            'titre.required'=> 'un titre doit etre fourni'
        ];
    }
}
