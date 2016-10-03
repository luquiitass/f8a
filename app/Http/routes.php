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

//pais Resources
/********************* pais ***********************************************/
Route::resource('pais','\App\Http\Controllers\PaisController');
Route::get('/pais','PaisController@pais')->name('pais');
Route::get('/pais/{pais}/edit','PaisController@edit');
Route::post('pais/{id}/update','\App\Http\Controllers\PaisController@update');
Route::get('pais/{pais}/delete','\App\Http\Controllers\PaisController@destroy');
Route::get('pais/{id}/deleteMsg','\App\Http\Controllers\PaisController@DeleteMsg');
//****DataTables***********
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

Route::post('localidad/{localidad}/update','LocalidadController@update');
Route::get('localidad/{localidad}/delete','LocalidadController@destroy');
Route::get('localidad/{id}/deleteMsg','\App\Http\Controllers\LocalidadController@DeleteMsg');
/********************* $localidad ***********************************************/

//Seguridad Resources
//***********Seguridad****************************
Route::get('/seguridad','SeguridadController@index')->name('segutidad.index');
//***********Seguridad****************************


//Permiso Resources
//*************Permiso***************
Route::get('/permiso','PermisoController@index')->name('permiso.index');
Route::get('/permiso/create','PermisoController@create')->name('permiso.create');
Route::post('permiso','PermisoController@store');
Route::get('permiso/{permission}/edit','PermisoController@edit');
Route::post('permiso/{permission}/update','PermisoController@update');
Route::get('permiso/{permission}/deleteMsg','PermisoController@deleteMsg');
Route::get('permiso/{permission}/delete','PermisoController@destroy');
//*************Permiso***************

//Roll Resource

//************Rol*********************
Route::get('/rol','RolController@index');
Route::get('rol/create','RolController@create')->name('rol.reate');
Route::get('/rol/{role}/edit','RolController@edit');
Route::post('/rol/{role}/update','RolController@update');
Route::get('/rol/{role}/deleteMsg','RolController@DeleteMsg');
Route::get('/rol/{role}/delete','RolController@destroy');
Route::post('rol','RolController@store');
//************Rol*********************


//**************Competencia***************
Route::get('competencias','CompetenciaController@index')->name('competencia.index');
Route::get('competencia/create','CompetenciaController@create')->name('competencia.create');
Route::post('competencia','CompetenciaController@store');
Route::get('competencia/{competencia}','CompetenciaController@show')->name('competencia.show');
Route::get('competencia/{competencia}/edit','CompetenciaController@edit')->name('competencia.edit');
Route::post('competencia/{competencia}/update','CompetenciaController@update')->name('competencia.update');
Route::get('competencia/{competencia}/deleteMsg','CompetenciaController@deleteMsg')->name('competencia.deleteMsg');
Route::get('competencia/{competenci}/delete','CompetenciaController@destroy')->name('competencia.delete');
//**************Competencia***************