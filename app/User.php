<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable  implements  HasRoleAndPermissionContract
{
    use  HasRoleAndPermission;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //***********Relaciones******************

    public function competencias(){
        return $this->belongsToMany(Competencia::class)->withTimestamps();
    }

    public function equipos(){
        return $this->belongsToMany(Equipo::class)->withTimestamps();
    }

    //**************** Fin de Relaciones**********************



    //**Consultass**

    public function scopeLike($query,$col,$value)
    {
        return $query->orWhere($col,'LIKE',"%$value%");
    }
    public function scopeColum($query,$colum)
    {
        return $query->select($colum);
    }


}
