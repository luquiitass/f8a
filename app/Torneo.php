<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    //
    use Administradores,Trait_Fechas,Funciones;

    protected $table = 'torneos';

    protected $fillable = ['nombre','inicio','fin','descripcion'];

    protected $dates = ['inicio','fin'];

    //------Relaciones--------------

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class)->withTimestamps();
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }

    public function fases()
    {
        return $this->hasMany(Fase::class);
    }

    public function tipoTorneo(){
        return $this->belongsTo(TipoTorneo::class);
    }


    //No me acuerdo como se llaman estos metodos ;>)

    public function faseActiva(){
        return $this->fases->where('estado',Fase::$estados[1])->first();
    }

    public function generarLiga(){
//        $atribustosFase = ['torneo_id'=>$this->id,'nombre'=>'fase-liga','descripcion'=>'En esta fase se creara una liga','estado'=>Fase::$estados[1]];
//
//        $fase = new Fase($atribustosFase);//$this->fases()->save($atribustosFase);
//        $fase->save();
//
//        $grupo = $fase->crearGrupo();
//
//        $grupo->asociarEquipos($this->equipos);

        $grupo = Grupo::find(5);

        $fechas = $grupo->crearFechas();

        foreach ($fechas as $fecha){
            $fecha->crearPartidos();
        }
    }

}
