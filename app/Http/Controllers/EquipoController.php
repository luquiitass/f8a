<?php

namespace App\Http\Controllers;


use Request;
use App\Equipo;
use App\Http\Requests\EquipoRequestStore;
use App\Http\Requests\EquipoRequestUpdate;
use Amranidev\Ajaxis\Ajaxis;

class EquipoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipos = Equipo::get();
        return view('equipo.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipoRequestStore $request)
    {
        //
        $equipo =  Equipo::create($request->except('_token'));

        $equipo->removeAdministradores();

        $equipo->addAdministradores($request->only('administradores'));

        return redirect()->to('equipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        return view('equipo.show',compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
        $users = array();
        $us = array();
        foreach ($equipo->users as $user)
        {
            $users[$user->id]=$user->name;
            $us[]=$user->id;
        }
        return view('equipo.edit',compact('equipo','users','us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(EquipoRequestUpdate $request,Equipo $equipo)
    {
        //
        $equipo->update($request->except('_token','_method'));

        $equipo->removeAdministradores();

        $equipo->addAdministradores($request->only('administradores'));

        return redirect()->to('equipo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $equipo
     * @return \Illuminate\Http\Response
     */

    public function deleteMsg(Equipo $equipo)
    {
        $url = "/equipo/$equipo->id/delete";
        if (Request::ajax()){
            return Ajaxis::BtDeleting('Eliminar Equipo',"Esta seguro que decea eliminar al equipo $equipo->nombre ",$url);
        }
    }



    public function destroy(Equipo $equipo)
    {
        //
        $equipo->delete();

        return \URL::to('equipo');
    }
}
