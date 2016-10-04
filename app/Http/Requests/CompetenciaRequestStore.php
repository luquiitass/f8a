<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompetenciaRequestStore extends Request
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
            //
            'nombre'=>'required|unique:competencias|min:4',
            'descripcion'=>'required',
            'fecha_inicio'=>'required',
            'org_partidos'=>'required',
        ];
    }
}
