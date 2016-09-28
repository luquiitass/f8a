<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permiso;


class SeguridadController extends Controller
{
    //
    public function index()
    {
        $permisos = Permiso::get();
        $roles = [];
        return view('seguridad.index',compact('permisos','roles'));
    }
}
