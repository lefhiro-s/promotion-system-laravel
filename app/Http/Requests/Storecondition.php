<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storecondition extends FormRequest
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
            'id_promotion'            => 'required',
            'description_conditions'  => 'required'
        ];
    }
    public function attributes()
    {
        return[
        'id_promotion'            => 'Promocion',
        'description_conditions'  => 'Descripcion'
        ];
    }
}
