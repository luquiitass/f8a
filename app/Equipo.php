<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Administradores;

class Equipo extends Model
{
    use Administradores;

    protected $table='equipos';

    protected $fillable = ['nombre','apodo','fundado','fundadores','descripcion'];


    /* **********************  Relaciones   *****************************/

    public function estadios()
    {
        return $this->belongsToMany(Estadio::class)->withTimestamps();
    }

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }




    /* **********************  Relaciones   *****************************/


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

}
