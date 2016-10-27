<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    protected $table = 'telefonos';

    protected $fillable = ['numero'];

    public function contactos()
    {
        return $this->belongsToMany(Contacto::class)->withTimestamps();
    }
}
