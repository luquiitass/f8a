<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use App\Http\JSON_retorno;
use Request;
use Amranidev\Ajaxis\Ajaxis;
use App\Http\Requests\RolRequestStore;

class RolController extends Controller
{
    //
    public function index(){

        $role = Role::first();
        return dd($role->has('5'));
    }

    public function store(RolRequestStore $request){

        $input = Request::except('_token');
        $permisos = array();

        if (array_has($input,'permisos')) {

           $permissions = $input['permisos'];

           foreach ($permissions as $key => $value) {
               $permisos[] = $key;
           }
       }

        $role = new Role();
        $role->name = $input['name'];
        $role->slug = $input['slug'];
        $role->description = $input['description'];
        $role->save();

        $role->attachPermission($permisos);

        return redirect()->to('seguridad');
    }

    public function create(){
        $permisos = Permission::get();

        //dd($permisos);

        return view('seguridad.roles.create',compact('permisos'));
    }

    public function edit(Role $role){
        $permisos = Permission::get();
        return view('seguridad.roles.edit',compact('role','permisos'));
    }

    public function update(Role $role){

        $input = Request::except('_token');

        $permissions = $input['permisos'];
        $permisos = array();

        foreach ($permissions as $key => $value){
            $permisos[]= $key;
        }

        $role->name = $input['nombre'];
        $role->slug = $input['slug'];
        $role->description = $input['descripcion'];
        $role->save();

        $role->detachAllPermissions();
        $role->attachPermission($permisos);

        return redirect()->to('seguridad');
    }

    public function DeleteMsg(Role $role)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el Rolv'.$role->name.' ?','/rol/'. $role->id . '/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //cuando se cree una direccion tendre que validar ante de eliminar si no posee direcciones asociadas
        $role->delete();

        $json = new JSON_retorno();
        $json->setMensaje('Rol eliminada','success');
        $json->setFadeOut('#li_roles_id_'.$role->id);
        $json->setFadeOut('#tab_rol_'.$role->id);

        return $json->getAllJSON();
    }
}
