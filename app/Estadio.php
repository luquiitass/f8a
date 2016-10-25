<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    //
    protected $table = 'estadios';

    protected $fillable = ['nombre','alias','capasidad','iluminado','arquitectos','dueños','inauguracion'];

    public function direccion(){
        return $this->hasOne(Direccion::class);
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }
}
