<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeitem extends FormRequest
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
            'id_promotion'   => 'required',
            'price'          => 'required',
            'title'          => 'required',
            'total_pay'      => 'required',
            'quantity'       => 'required',
            'comission_site' => 'required',
        ];
    }
    public function attributes()
    {
        return[
            'id_promotion'   => 'Promocion',
            'price'          => 'Precio',
            'title'          => 'Título',
            'total_pay'      => 'Pago Total',
            'quantity'       => 'Cantidad',
            'comission_site' => 'Comision del sitio',
        ];
    }
}
