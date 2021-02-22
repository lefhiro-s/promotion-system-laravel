<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storephoto extends FormRequest
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
            'id_promotion' => 'required',
            'url'          => 'required|max:300|url'
        ];
    }
    public function attributes()
    {
        return[
            'id_promotion' => 'Promocion',
           
        ];
    }
}
