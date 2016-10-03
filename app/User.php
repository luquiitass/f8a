<?php

namespace App;

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

    public function competencias(){
        return $this->belongsToMany(Competencia::class)->withTimestamps();
    }

    public function misPermisosRoles(){
        $retorno = array();
        foreach ($this->getRoles() as $rol){
            echo $rol->name;
            dd($rol->permissions);
            foreach ($rol->permissions() as $permiso){
                $retorno[]= $permiso;
            }
        }
        return $retorno;
    }

}
