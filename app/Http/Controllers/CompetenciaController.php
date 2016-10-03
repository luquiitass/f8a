<?php

namespace App\Http\Controllers;

use App\Competencia;
use Request;

class CompetenciaController extends Controller
{
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
    public function store(Request $request)
    {
        //
        $input = Request::except('_token');

        dd($input);

        $competencia = new Competencia();

        $competencia->nombre = $input['nombre'];
        $competencia->descripcion = $input['descripcion'];
        $competencia->fecha_inicio = $input['fecha_inicio'];
        $competencia->org_partidos = $input['org_partidos'];

        $competencia->save();

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
        return view('competencia.edit',compact('competencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competencia $competencia)
    {
        //
        $input = Request::except('_token');

        $competencia ->nombre = $input['nombre'];
        $competencia ->descripcion = $input['descripcion'];
        $competencia ->fecha_inicio = $input['fecha_inicio'];
        $competencia ->org_partidos = $input['org_partidos'];

        $competencia->update();

        return  redirect()->to('competencia/'.$competencia->id);


    }

    public function deleteMsg(Competencia $competencia)
    {
        return 'mensaje de ajaxis';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
