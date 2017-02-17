<?php

namespace App\Http\Controllers;

use App\Competencia;
use App\Http\JSON_retorno;
use Request;
use Amranidev\Ajaxis\Ajaxis;

use App\Http\Requests\CompetenciaRequestStore;
use App\Http\Requests\CompetenciaRequestUpdate;
class CompetenciaController extends Controller
{

    public function portada(Competencia $competencia)
    {
        return view('competencia.unaCompetencia.portada',compact('competencia'));

    }

    public function index_configuraciones(Competencia $competencia)
    {
        $id_temporada = Request::get('temporada');
        $id_torneo = Request::get('torneo');
        if (empty($id_temporada)){
            $temporada = $competencia->temporadas->first();
            if (!empty($temporada)){
                $id_temporada = $temporada->id;
            }
        }
        if (empty($id_torneo)){
            if (!empty($temporada)){
                if ($temporada->t_has('torneos')){
                    //dd($temporada->torneos->first()->id);
                    $id_torneo = $temporada->torneos->first()->id;
                }
            }
        }
        return view('competencia.unaCompetencia.index_configuraciones',compact('competencia','id_temporada','id_torneo'));

    }

    public function show_configuraciones(Competencia $competencia){
        return view('competencia.unaCompetencia.show_configuraciones',compact('competencia'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $competencias = Competencia::with('users')->get();
        return view('competencia.index',compact('competencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('competencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenciaRequestStore $request)
    {
        //
        $input = Request::except('_token');

        $administradores = $input['administradores'];


        $competencia = new Competencia();

        $competencia->nombre = $input['nombre'];
        $competencia->descripcion = $input['descripcion'];
        $competencia->org_partidos = $input['org_partidos'];

        $competencia->save();

        $competencia->addAdministradores($administradores);

        return redirect()->to('competencia/'.$competencia->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competencia $competencia)
    {
        return view('competencia.show',compact('competencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competencia $competencia)
    {
        $users = array();
        $us = array();
        foreach ($competencia->users as $user)
        {
            $users[$user->id]=$user->name;
            $us[]=$user->id;
        }

        return view('competencia.edit',compact('competencia','users','us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenciaRequestUpdate $request, Competencia $competencia)
    {
        //
        $input = Request::except('_token');

        $administradores = $input['administradores'];

        //dd($administradores);

        $competencia ->nombre = $input['nombre'];
        $competencia ->descripcion = $input['descripcion'];
        $competencia ->org_partidos = $input['org_partidos'];

        $competencia->removeAdministradores();

        $competencia->addAdministradores($administradores);

        $competencia->update();
        if (Request::ajax()){
            return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
        }

        return  redirect()->to('competencia/'.$competencia->id);


    }

    public function deleteMsg(Competencia $competencia)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la competencia '.$competencia->name.' ?','/competencia/'. $competencia->id . '/delete');
        if(Request::ajax())
        {
            return $msg;
        }
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competencia $competencia)
    {
        //
        $competencia->delete();

        return \URL::to('competencias');
    }
}
