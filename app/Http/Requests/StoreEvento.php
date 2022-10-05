<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//la logica será con otro paquete por eso lo deje true para que siempre pase
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => 'required|min:5',
            'ubicacion' => 'required',
            'detalle' => 'required',
            'cantpersonas' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'titulo' => 'Titulo del Evento',
            'ubicacion' => 'Ubicacion',
            'detalle' => 'Detalle',
            'cantpersonas' => 'Capacidad'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Debe ingresar un titulo al evento',
            'ubicacion.required' => 'Debe ingresar la direccion del evento',
            'detalle.required' => 'Debe ingresar detalles del evento',
            'cantpersonas.required' => 'Cantidad max de personas?',
            'cantpersonas.numeric' => 'Solo numeros' 
        ];
    }
}
