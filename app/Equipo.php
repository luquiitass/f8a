<?php

namespace App;

use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Administradores;

class Equipo extends Model
{
    use Administradores;

    protected $table='equipos';

    protected $relations =['jugadores','users'];

    protected $fillable = ['nombre','apodo','fundado','fundadores','descripcion'];


    /* **********************  Relaciones   *****************************/

    public function jugadores()
    {
        return $this->belongsToMany(Jugador::class)
            ->withTimestamps()
            ->wherePivot('actual',1)
            ->withPivot('actual')
            ->withPivot('id');
    }

    public function estadios()
    {
        return $this->belongsToMany(Estadio::class)->withTimestamps();
    }

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }

    public function hasEstadio($value){
        return $this->estadios()->where('nombre',$value)->count() > 0?true:false;
    }


    /* **********************  Relaciones   *****************************/









    /****************** Mettodos Add relaciones ******************************/

    public function addEstadio($estadio)
    {
        if (Estadio::exist($estadio['nombre']))
        {
            if (! $this->hasEstadio($estadio['nombre']))
            {
                $this->estadios()->attach( Estadio::getEstadio($estadio['nombre'])->id );
            }
        }else{
            $this->estadios()->attach( Estadio::create($estadio));
        }
        return Estadio::getEstadio($estadio['nombre']);
    }

    public function removerEstadios(){
        return $this->estadios()->detach();
    }

    public function addJugador($data,User $user=null)
    {
        if ($this->jugadores->contains('numero', $data['numero'])) {
            throw new \Exception('Este equipo ya posee un jugador con el mismo numero, debe cambiarlo');
        }

        if (!is_null($user)) {
            $jugador = $user->addJugador($data);
        } else {
            $jugador = new Jugador($data);
        }

       // dd($jugador);

        $jugador->save();
        $this->jugadores()->attach($jugador);

    }

    /****************** Mettodos Add relaciones ******************************/


    //************* operaciones******************

    /*  ************En Vistas*****************  */

    public function mostrarDatos(){
        return array(
            'Nombre' => $this->nombre,
            'Alias' => $this->apodo,
            'Fundado' => $this->fundado,
            'Fundadores' => $this->fundadores,
            'Direccion' =>$this->estadios()->first()->direccion->direccionCompleta(),
            'Estadio' => $this->estadios()->first()->nombre
        );
    }

    public function getDireccion(){
    }

    public function getNumerosDisponibles($except_num=null){
        $jugadores = $this->jugadores;
        $retorno =[];
        foreach (range(1,100) as $value)
        {
            if (!$jugadores->pluck('numero')->contains($value) != ($value == $except_num))
            {
                $retorno[$value]=$value;
            }
        }
        return $retorno;
    }

}
