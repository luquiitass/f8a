<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Permission;
use Illuminate\Http\Request;
use Amranidev\Ajaxis\Ajaxis;

use App\Http\Requests\PermisoRequestStore;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguridad.permiso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermisoRequestStore $request)
    {
        //
        $input = $request->except('_token');

        $permission = new Permission();
        $permission->name = $input['nombre'];
        $permission->slug = $input['slug'];
        $permission->model = $input['model'];
        $permission->description = $input['descripcion'];
        $permission->save();

        return redirect()->to('seguridad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('seguridad.permiso.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permission)
    {
        //
        $input = $request->except('_token');

        $permission->name = $input['nombre'];
        $permission->slug = $input['slug'];
        $permission->model = $input['model'];
        $permission->description = $input['descripcion'];

        $permission->update();

        return redirect()->to('seguridad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMsg(Permission $permission){

        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el Permiso'.$permission->name.' ?','/permiso/'. $permission->id . '/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
    }
}
