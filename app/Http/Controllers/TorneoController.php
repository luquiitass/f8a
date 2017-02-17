<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Equipo;
use App\Http\JSON_retorno;
use App\Http\Requests\TemporadaRequestStore;
use App\Http\Requests\TemporadaRequestUpdate;
use App\Http\Requests\TorneoRequestStore;
use App\Http\Requests\TorneoRequestUpdate;
use App\Temporada;
use App\Competencia;
use App\Torneo;
use Carbon\Carbon;
use Dompdf\Exception;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use Request;

class TorneoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Temporada $temporada)
    {
        //
        $torneos = $temporada->torneos;
        return view('torneo.index',compact('torneos'));
    }


    public function indexConfiguraciones(Temporada $temporada){
        // = $temporada->torneoActivo();
        $competencia = $temporada->competencia;

        return view('torneo.admin.index_configuraciones',compact('competencia','temporada'));
        //dd($competencia);
    }

    public function showConfiguraciones(Torneo $torneo){
        $competencia = $torneo->temporada->competencia;
        return view('torneo.admin.show_configuraciones',compact('competencia','torneo'));
        //dd($competencia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Temporada $temporada)
    {
        $body = view('torneo.comp_create',compact('temporada'))->render();
        return view('modals.modal2',compact('body'))->render();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TorneoRequestStore $request)
    {
        //
        $input = Request::except('_token');

        $temporada = Temporada::findOrFail($input['temporada_id']);

        $categorias = $input['categorias'];

        //dd($categorias);

        try{
            $torneo = new Torneo($input);
            //dd($torneo);
            $temporada->torneos()->save($torneo);

            $torneo->t_attach('categorias',$categorias);

        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl('configuraciones/temporada/'.$temporada->id)->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Temporada $temporada)
    {
        return view('torneo.show',compact('torneo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporada $temporada)
    {
        $users = array();
        $us = array();
        foreach ($temporada->users as $user)
        {
            $users[$user->id]=$user->name;
            $us[]=$user->id;
        }

        return view('torneo.edit',compact('torneo','users','us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TorneoRequestUpdate $request,Torneo $torneo)
    {
        //
        $input = Request::except('_token');

        $temporada = Temporada::findOrFail($input['temporada_id']);

        $categorias = $input['categorias'];

        //dd($categorias);

        try{
            //$torneo = new Torneo($input);
            //dd($torneo);
            $torneo->update($input);

            $torneo->t_detach('categorias');

            $torneo->t_attach('categorias',$categorias);

        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl('configuraciones/torneo/'.$torneo->id)->getAllJSON();

    }

    public function deleteMsg(Torneo $torneo)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar la torneo '.$torneo->nombre.' ?','/torneo/'. $torneo->id . '/delete');
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
    public function destroy(Torneo $torneo)
    {
        $id = $torneo->id;
        try {
            $torneo->delete();
        }catch(Execution $e){
            JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setMensaje('Torneo Eliminado Corrrectamente','success')->setFadeOut('#torneo_id_'.$id)->getAllJSON();

    }

    public function addEquipo(Request $request,Torneo $torneo)
    {
        //dd(Request::all());
        try {
            $equipos = Request::except('_token');
            $torneo->equipos()->attach($equipos['equipos']);
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setMensaje('Equipos Añadidos','success')->setUrl(\URL::previous())->getAllJSON();
    }

    public function removeEquipo(Torneo $torneo,Equipo $equipo){
        try{
            $torneo->equipos()->detach($equipo->id);
        }catch (Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()
            ->setFadeOut('#id_fila_equipo_'.$equipo->id)
            ->setMensaje('Se ha eliminado el equipo '.$equipo->nombre.' de esta Torneo','success')
            ->getAllJSON();
    }
}
