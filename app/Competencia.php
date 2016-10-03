<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    //
    protected $table = 'competencias';

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
