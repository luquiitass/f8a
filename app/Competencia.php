<?php

namespace App;

use App\Administradores;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use Administradores;
    //
    protected $table = 'competencias';

    /***************** Funciones para las vistas  ********************/
    public function getDatos()
    {
        return array(
            'Creado:'=> $this->created_at,
            'Administradores'=> $this->users()->colum('name')->get()->implode('name',', a'),
        );

    }
    /***************** Fin Funciones para las vistas  ********************/
}
