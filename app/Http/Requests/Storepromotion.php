<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storepromotion extends FormRequest
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
            "title_main"    => 'max:100',
            "title_long"    => 'max:100',
            "title_short"   => 'max:70',
            "description"   => 'max:100',
            "latitude"      => 'max:100',
            "longitude"     => 'max:100',
            "city"          => 'max:20',
            "end_time"      => 'required',
            "type"          => 'max:45',
            "discount"      => 'max:5',
            "contact_info"  => 'max:200',
        ];
    }

    public function attributes()
    {
        return[
            "title_main"    => 'Título Principal',
            "title_long"    => 'Título largo',
            "title_short"   => 'Título corto',
            "description"   => 'Descripción',
            "latitude"      => 'Latitud',
            "longitude"     => 'Longitud',
            "city"          => 'Ciudad',
            "end_time"      => 'Fecha de finalización',
            "type"          => 'Tipo',
            "discount"      => 'Descuento',
            "contact_info"  => 'Informacion de contacto',
        ];
    }
}
