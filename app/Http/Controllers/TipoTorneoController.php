<?php

namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Http\JSON_retorno;
use App\Http\Requests\TipoTorneoRequestStore;
use App\Http\Requests\TipoTorneoRequestUpdate;
use App\TipoTorneo;
use Dompdf\Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class TipoTorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = TipoTorneo::get();

        return view('parametros.tiposTorneo.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $body = view('parametros.tiposTorneo.comp_create')->render();
        $modal = view('modals.modal2',compact('body'))->render();
        return $modal;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoTorneoRequestStore $request)
    {
        $input = \Request::except('_token');
        //dd($input);
        try{
            $tipoTorneo = new  TipoTorneo($input);
            $tipoTorneo->save();
        }catch (Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoTorneo $tipoTorneo)
    {
        //
        return view('parametros.tiposTorneo.show',['tipo'=>$tipoTorneo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoTorneo $tipoTorneo)
    {
        //
        $body = view('parametros.tiposTorneo.comp_edit',['tipo'=>$tipoTorneo])->render();
        $modal = view('modals.modal2',compact('body'))->render();
        return $modal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoTorneoRequestUpdate $request, TipoTorneo $tipoTorneo)
    {
        $input = \Request::except('_token');
        //dd($input);
        try{
            $tipoTorneo->update($input);
        }catch (Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }

        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }

    public function deleteMsg(TipoTorneo $tipoTorneo)
    {
        $msg = Ajaxis::BtDeleting('Cuidado!!','¿Esta seguro de eliminar el tipo '.$tipoTorneo->nombre.'?','/tipoTorneo/'. $tipoTorneo->id . '/delete/');

        if(\Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoTorneo $tipoTorneo)
    {
        try{
            $tipoTorneo->delete();
        }catch (\Exception $e){
            return JSON_retorno::create()->setMensaje($e->getMessage(),'danger','true')->getAllJSON();
        }
        return JSON_retorno::create()->setUrl(\URL::previous())->getAllJSON();

    }
}
