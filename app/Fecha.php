<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    //
    protected $table = 'fechas';

    protected $fillable = ['nombre','descripcion','comentario','estado','grupo_id'];

    // ----------------Relaciones---------------------
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }

    public function partidos(){
        return $this->hasMany(Partido::class);
    }

    // ----------------Relaciones---------------------

    public function crearPartidos()
    {
        $equipos = $this->grupo->equipos->all();
        $catEquipos = count($equipos);
        $partidos = array();

        if($catEquipos % 2 == 0){
            $inicio = 0;
        }else{
            $inicio = 1;
            $this->equipo_libre_id = $equipos[0]->id;
        }

        for ($i = $inicio; $i > $catEquipos; $i++) {
            $numPartido = 1;
            for ($j = $catEquipos - 1; $j == 0; $j--) {
                if ($equipos[$i]->id != $equipos[$j]->id) {
                    $atributosPartido = ['numero' => $numPartido, 'eq1_id' => $equipos[$i]->id, 'eq2_id' => $equipos[$j]->id, 'eq_local_id' => null, 'gol_eq1' => null, 'gol_eq2' => null, 'hora' => null, 'fecha' => null, 'edtadio_id' => null, 'fecha_id' => $this->id, 'estado' => 'Pendiente', 'comentario' => null];
                    $partidos[] = $atributosPartido;
                    $numPartido = $numPartido + 1;
                }
            }
        }

        $this->partidos()->create($partidos);
        $this->save();
    }
}
