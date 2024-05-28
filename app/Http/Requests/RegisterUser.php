<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUser extends FormRequest
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
            'name' => 'required',
            'name' => 'required|unique:users,email',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        //throw : Utilisé pour lancer une exception en PHP.
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'status_code'=> 422,
            'error'=>true,
            'message'=>'Erreur de valdation',
            'errorsList'=>$validator->errors(),
        ]));
    }

    public function messages()
    {
        return [
            'name.required'=> 'un nom doit etre fourni',
            'email.required'=> 'une adresse mail doit etre fourni',
            'email.unique'=> 'cette adresse mail existe deja',
            'password.required'=> 'le mot de passe est requis',
        ];
    }
}
