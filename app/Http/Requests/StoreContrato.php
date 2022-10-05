<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContrato extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'detalle' => 'required',
            'clausulaDelEvento' => 'required',
            'politicaCancelacion' => 'required',
            'plazoDeEntrega' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'detalle.required' => 'Debe ingresar detalles del contrato',
            'clausulaDelEvento.required' => 'Debe ingresar la clausula del contrato',
            'politicaCancelacion.required' => 'Debe ingresar la politica de Cancelacion',
            'plazoDeEntrega.required' => 'Debe ingresar el plazo de Entrega'
        ];
    }

}
