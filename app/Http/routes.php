<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//*******Pruebas***
Route::get('p','PruebaController@index');
//*******Pruebas***



//User
Route::resource('user','UserController');
Route::get('dt_users','UserController@dt_users');
//FinUsers


/* ************** Select **************** */
Route::get('usersSelect2','UserController@select2');
Route::get('categoriasSelect2','CategoriaController@select2');
Route::get('equiposSelect2','EquipoController@select2');
Route::get('equiposSelect2/{torneo}','EquipoController@categoriasSelect2');

Route::get('usersSelect','UserController@select');
/* ************** User **************** */

//pais Resources
/********************* pais ***********************************************/
Route::resource('pais','\App\Http\Controllers\PaisController');
Route::get('/pais','PaisController@pais')->name('pais');
Route::get('/pais/{pais}/edit','PaisController@edit');
Route::post('pais/{id}/update','\App\Http\Controllers\PaisController@update');
Route::get('pais/{pais}/delete','\App\Http\Controllers\PaisController@destroy');
Route::get('pais/{id}/deleteMsg','\App\Http\Controllers\PaisController@DeleteMsg');
//****DataTables***********
Route::post('/pais/buscar','PaisController@buscar');
Route::get('dt_paises','PaisController@DT_paises')->name('dt_paises');
Route::get('autoCompletePais','PaisController@autoCompletePais')->name('autoCompletePais');
/********************* pais ***********************************************/


//provincia Resources
/********************* provincia ***********************************************/
Route::resource('provincia','\App\Http\Controllers\ProvinciaController');
Route::get('/provincias','ProvinciaController@index')->name('provincia');

Route::get('/{pais}/provincias/create','ProvinciaController@create');
Route::get('/provincia/{provincia}/edit','ProvinciaController@edit');
Route::post('/provincia/{provincia}/update','ProvinciaController@update');
Route::post('/{pais}/provincia/store','\App\Http\Controllers\ProvinciaController@store');
Route::get('provincia/{provincia}/delete','\App\Http\Controllers\ProvinciaController@destroy');
Route::get('provincia/{id}/deleteMsg','\App\Http\Controllers\ProvinciaController@DeleteMsg');
/***********DataTable***************/
Route::get('dt_provincias/{pais}','ProvinciaController@DT_provincia')->name('dt_provincia');
Route::get('autoCompleteProvincia/{pais}','ProvinciaController@autoCompleteProvincia')->name('autoCompleteProvincia');

/********************* provincia ***********************************************/



//$localidad Resources
/********************* $localidad ***********************************************/
Route::resource('localidad','\App\Http\Controllers\LocalidadController');
Route::get('/{provincia}/localidad/create','LocalidadController@create');
Route::post('/{provincia}/localidad/store','LocalidadController@store');
Route::get('/provincia/listForSelect/{pais}','ProvinciaController@listForSelect');

Route::post('localidad/{localidad}/update','LocalidadController@update');
Route::get('localidad/{localidad}/delete','LocalidadController@destroy');
Route::get('localidad/{id}/deleteMsg','\App\Http\Controllers\LocalidadController@DeleteMsg');
Route::get('/localidad/listForSelect/{provincia}','LocalidadController@listForSelect');

/********************* $localidad ***********************************************/

//Seguridad Resources
//***********Seguridad****************************
Route::get('/seguridad','SeguridadController@index')->name('segutidad.index');
//***********Seguridad****************************


//Permiso Resources
//*************Permiso***************
Route::resource('permission','PermisoController');
//Route::get('/permiso','PermisoController@index')->name('permiso.index');
//Route::get('/permiso/{permission}','PermisoController@show')->name('permiso.show');
//Route::get('/permiso/create','PermisoController@create')->name('permiso.create');
//Route::post('permiso','PermisoController@store');
//Route::get('permiso/{permission}/edit','PermisoController@edit');
//Route::post('permiso/{permission}/update','PermisoController@update');
Route::get('permission/{permission}/deleteMsg','PermisoController@deleteMsg');
Route::get('permission/{permission}/delete','PermisoController@destroy');
//*************Permiso***************

//Roll Resource

//************Rol*********************
Route::resource('role','RolController');
//Route::get('/rol','RolController@index');
//Route::get('rol/create','RolController@create')->name('rol.reate');
//Route::get('/rol/{role}/edit','RolController@edit');
//Route::post('/rol/{role}/update','RolController@update');
Route::get('/role/{role}/deleteMsg','RolController@DeleteMsg');
Route::get('/role/{role}/delete','RolController@destroy');
//Route::post('rol','RolController@store');
//************Rol*********************


//**************Competencia***************
Route::resource('competencia','CompetenciaController');
Route::get('competencia/{competencia}/portada','CompetenciaController@portada')->name('competencia.portada');
//Route::get('competencia/{competencia}/configuraciones','CompetenciaController@configuraciones')->name('competencia.configuraciones');
Route::get('configuraciones/competencia/{competencia}/general','CompetenciaController@index_configuraciones')->name('competencias.configuraciones');
Route::get('configuraciones/competencia/{competencia}','CompetenciaController@show_configuraciones')->name('competencia.configuraciones');

//Route::get('competencias','CompetenciaController@index')->name('competencia.index');
//Route::get('competencia/create','CompetenciaController@create')->name('competencia.create');
//Route::post('competencia','CompetenciaController@store');
//Route::get('competencia/{competencia}','CompetenciaController@show')->name('competencia.show');
//Route::get('competencia/{competencia}/edit','CompetenciaController@edit')->name('competencia.edit');
//Route::post('competencia/{competencia}/update','CompetenciaController@update')->name('competencia.update');
Route::get('competencia/{competencia}/deleteMsg','CompetenciaController@deleteMsg')->name('competencia.deleteMsg');
Route::get('competencia/{competencia}/delete','CompetenciaController@destroy')->name('competencia.delete');
//**************Competencia***************

/******************ultimo git********************/

/*****************  Equipo *****************************/
Route::resource('equipo','EquipoController');


Route::get('equipo/{equipo}/perfil','EquipoController@perfil')->name('equipo.perfil');
Route::get('equipo/{equipo}/partidos','EquipoController@partidos')->name('equipo.partidos');
Route::get('equipo/{equipo}/calendario','EquipoController@calendario')->name('equipo.calendario');
Route::get('equipo/{equipo}/jugadores','EquipoController@jugadores')->name('equipo.jugadores');
Route::get('equipo/{equipo}/fotos','EquipoController@fotos')->name('equipo.fotos');
Route::get('equipo/{equipo}/configuraciones','EquipoController@configuraciones')->name('equipo.configuraciones');


Route::get('equipo/{equipo}/deleteMsg','EquipoController@deleteMsg')->name('equipo.deleteMsg');
Route::get('equipo/{equipo}/delete','EquipoController@destroy')->name('equipo.delete');
Route::get('datatable','EquipoController@dataTable');
Route::get('dt_equipos','EquipoController@DT_equipos');
Route::get('equiposPorCategoria','EquipoController@equiposPorCategorias');
//Route::get('equipos','EquipoController@index')->name('equipo.index');
//Route::get('equipo/create','EquipoController@create')->name('equipo.create');
//Route::post('equipo','EquipoController@store');
/*****************  Equipo *****************************/

/*************************  Estadio ********************************/
Route::resource('estadio','EstadioController');
Route::get('estadio/{estadio}/deleteMsg','EstadioController@DeleteMsg')->name('estadio.deleteMsg');
Route::get('estadio/{estadio}/delete','EstadioController@destroy@destroy');
/*************************  Estadio ********************************/


/* ************************ Telefono  ***************************************/
Route::resource('telefono','TelefonoController');
/* ************************ Telefono  ***************************************/


/* ************************ Contacto  ***************************************/
Route::resource('contacto','ContactoController');
/* ************************ Contacto  ***************************************/

/***************       Jugador   ***********************/
//Route::resource('jugador','JugadorController');
Route::get('equipo/{equipo}/jugadores','JugadorController@index');
Route::get('jugador/{equipo}/create','JugadorController@create');
Route::get('jugador/{jugador}','JugadorController@show');
Route::post('jugador/{equipo}','JugadorController@store')->name('jugador.store');
Route::put('jugador/{jugador}','JugadorController@update')->name('jugador.update');
Route::get('/jugador/{equipo}/{jugador}','JugadorController@edit')->name('jugador.edit');
Route::get('/jugador/{jugador}/{equipo}/bajaJugadorMsg','JugadorController@bajaJugadorMsg');
Route::get('/jugador/{jugador}/{equipo}/bajaJugador','JugadorController@bajaJugador');
Route::get('/jugador/{jugador}/{equipo}/deleteMsg','JugadorController@deleteMsg');
Route::get('/jugador/{jugador}/{equipo}/delete','JugadorController@destroy');

/***************       Jugador   ***********************/

/*********************** Imagenes ***********************/
//Route::resource('imagen','ImagenController');
Route::get('imagen','ImagenController@index');
Route::get('imagen/seleccionar_perfil','ImagenController@seleccionar_perfil')->name('imagen_selecccionar_perfil');
Route::post('imagen/cortar_perfil','ImagenController@cortar_perfil');
Route::post('imagen/cortar_escudo','ImagenController@cortar_escudo');
//Route::get('imagen/seleccionar','ImagenController@seleccionar')->name('imagen.seleccionar');
//Route::post('/imagen/recortar','ImagenController@recortar')->name('imagen.recortar');
//Route::post('/imagen/cortar','ImagenController@cortar')->name('imagen.cortar');
//Route::post('/imagen/guardar','ImagenController@store')->name('imagen.store');


/***********************Fin Imagenes ***********************/

/***************************Estados**********************************/
Route::resource('estado','EstadosController');
Route::get('estado/{estado}/deleteMsg','EstadosController@DeleteMsg');
Route::get('estado/{estado}/delete','EstadosController@destroy');
/***************************Fin Estados**********************************/

/***************************Configuracion**********************************/
Route::resource('configuracion','ConfiguracionController');
Route::get('configuracion/{configuracion}/deleteMsg','ConfiguracionController@DeleteMsg');
Route::get('configuracion/{configuracion}/delete','ConfiguracionController@destroy');
/***************************Fin Estados**********************************/

/***************************Temporada**********************************/
Route::resource('temporada','TemporadaController');
Route::get('temporada/{temporada}/edit','TemporadaController@edit')->name('temporada.edit');
Route::get('temporada/{competencia}/create','TemporadaController@create')->name('temporada.create');
Route::get('temporada/{temporada}/deleteMgs','TemporadaController@deleteMsg')->name('temporada.deleteMsg');
Route::get('temporada/{temporada}/delete','TemporadaController@destroy')->name('temporada.delete');

Route::get('configuracion/competencia/{competencia}/temporadas','TemporadaController@index_conf')->name('temporadas.configuraciones');
Route::get('configuraciones/temporada/{temporada}','TemporadaController@show_configuraciones')->name('temporada.configuraciones');
/***************************Fin Temporada**********************************/

/***************************Configuracion**********************************/
Route::resource('categoria','CategoriaController');
Route::get('categoria/{categoria}/deleteMsg','CategoriaController@DeleteMsg');
Route::get('categoria/{categoria}/delete','CategoriaController@destroy');
/***************************Fin Estados**********************************/

/*************************** Torneo **************************/
Route::resource('torneo','TorneoController');
Route::get('torneo/{temporada}/create','TorneoController@create')->name('torneo.create');
Route::get('torneo/{torneo}/deleteMgs','TorneoController@deleteMsg')->name('torneo.deleteMsg');
Route::get('torneo/{torneo}/delete','TorneoController@destroy')->name('torneo.delete');
Route::post('torneo/{torneo}/addEquipo','TorneoController@addEquipo');
Route::get('torneo/{torneo}/{equipo}/removeEquipo','TorneoController@removeEquipo');

Route::get('configuraciones/competencia/temporada/{temporada}/torneos','TorneoController@indexConfiguraciones')->name('torneos.configuraciones');
Route::get('configuraciones/torneo/{torneo}','TorneoController@showConfiguraciones')->name('torneo.configuraciones');
/**************************** Fin Torneo**************************/

Route::get('crop/perfil','CropController@crop_perfil');
Route::post('crop/perfil/store','CropController@store_perfil');

Route::get('crop/escudo','CropController@crop_escudo');
Route::post('crop/escudo/store','CropController@store_escudo');

Route::get('crop/portada','CropController@crop_portada');
Route::post('crop/portada/store','CropController@store_portada');


/*_________________________Pergil ___________________*/
Route::get('perfil/{user}','PerfilController@index')->name('perfil.index');


/*_________________________Pergil ___________________*/



/*_________________________Tipo Tornoe ___________________*/
Route::get('tipoTorneo','TipoTorneoController@index')->name('tipoTorneo.index');
Route::get('tipoTorneo/create','TipoTorneoController@create')->name('tipoTorneo.create');
Route::post('tipoTorneo','TipoTorneoController@store')->name('tipoTorneo.store');
Route::get('tipoTorneo/{tipoTorneo}','TipoTorneoController@show')->name('tipoTorneo.show');
Route::get('tipoTorneo/{tipoTorneo}/edit','TipoTorneoController@edit')->name('tipoTorneo.edit');
Route::put('tipoTorneo/{tipoTorneo}','TipoTorneoController@update')->name('tipoTorneo.update');
Route::get('tipoTorneo/{tipoTorneo}/deleteMsg','TipoTorneoController@deleteMsg')->name('tipoTorneo.deleteMsg');
Route::get('tipoTorneo/{tipoTorneo}/delete','TipoTorneoController@destroy')->name('tipoTorneo.delete');
/*_________________________Tipo Torneo ___________________*/

/*_________________________Tipo Fase ___________________*/
Route::get('tipoFase','TipoFaseController@index')->name('tipoFase.index');
Route::get('tipoFase/create','TipoFaseController@create')->name('tipoFase.create');
Route::post('tipoFase','TipoFaseController@store')->name('tipoFase.store');
Route::get('tipoFase/{tipoFase}','TipoFaseController@show')->name('tipoFase.show');
Route::get('tipoFase/{tipoFase}/edit','TipoFaseController@edit')->name('tipoFase.edit');
Route::put('tipoFase/{tipoFase}','TipoFaseController@update')->name('tipoFase.update');
Route::get('tipoFase/{tipoFase}/deleteMsg','TipoFaseController@deleteMsg')->name('tipoFase.deleteMsg');
Route::get('tipoFase/{tipoFase}/delete','TipoFaseController@destroy')->name('tipoFase.delete');
/*_________________________Tipo Fase ___________________*/



