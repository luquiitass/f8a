<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTorneo extends Model
{
    use Funciones,Trait_Fechas;
    //
    protected $table= 'tipos_torneo';

    protected $fillable = ['nombre','descripcion'];

    /* ----------------- Relaciones ---------------------------*/

    public function torneos(){
        return $this->hasMany(Torneo::class);
    }

    /* ----------------- Relaciones ---------------------------*/

    public static function select()
    {
        return self::getForSelect2(TipoTorneo::get(),'Sin Tipos de Torneo');

    }

    public function generarTorneo(Torneo $torneo){
        switch ($this->nombre){
            case 'Liga':
                $this->generarLiga($torneo);
                break;
        }
    }


    private function generarLiga(Torneo $torneo){
       $fase = Fase::createFaseLiga($torneo);
    }





}

