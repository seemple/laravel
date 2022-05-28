<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
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
            "mkNombre" => "required|min:3|max:30"
        ];
    }

    public function messages(){
        return [
            "mkNombre.required" =>"El campo nombre es obligatorio",
            "mkNombre.min" =>"El campo nombre debe ingresar al menos 3 caracteres",
            "mkNombre.max" => "Muchos caracteres"
        ];
    }

}
