<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    protected $table = 'contactos';

    protected $fillable= ['id','email','nombre'];

    public function telefonos()
    {
        return $this->belongsToMany(Telefono::class)->withTimestamps();
    }

    public function equipos()
    {
        return $this->belongsTo(Equipo::class);
    }
}
