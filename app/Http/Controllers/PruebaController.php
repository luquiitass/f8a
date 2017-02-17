<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Equipo;
use App\Funciones;
use App\Torneo;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\Exception;

class PruebaController extends Controller
{
    //
    public function index(){
        try {
            $torneo = Torneo::find(38);
            //dd($torneo->faseActiva()->grupos->first()->fases);
            //$grupo =$torneo->faseActiva()->grupos->first();
            //$grupo->crearFechas();
            $torneo->generarLiga();
        }catch (\Exception $e){
            echo ($e->getMessage());
        }
    }
}
