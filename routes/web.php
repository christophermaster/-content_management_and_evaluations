<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');


// LOGIN

Route::get('/', function () {
    return view('auth/login');
});

/**
 * iNICIO DE LA APLICACION 
 * ventana que aparece despues del login
 * 
 * */ 
Route::Resource('/gestion/contenido','ContenidoController');
/**
 * Perfil
 */
Route::get('/miperfil', function () {
    return view('perfil/myPerfil');
});
Route::get('mis/ejercicios', function () {
    return view('ejercicio/miejercicios/ejercicios');
});
Route::get('otros/ejercicios', function () {
    return view('ejercicio/todoLosEjercicios/ejercicios');
});
Route::get('gestion/solucion', function () {
    return view('gestion/solucion/solucion');
});
/**
 * Facultad
*/
Route::Resource('administracion/facultad','FacultyController');

/**
 * Escuela
*/
//Route::Resource('administracion/facultad/escuela/{id}', ['as' => 'escuela', 'uses' => 'SchoolController']);
Route::get('facultad/escuela/{id}', ['as' => 'escuela', 'uses' => 'SchoolController@index']);
Route::get('facultad/escuela/create/{id}', ['as' => 'createEscuela', 'uses' => 'SchoolController@create']);
Route::get('facultad/escuela/modificar/{id}', ['as' => 'updateEscuela', 'uses' => 'SchoolController@edit']);
Route::post('facultad/escuela/modificar/{id}', 'SchoolController@update');
Route::post('facultad/escuela','SchoolController@store');

/**
 * Catedra
 */
Route::get('facultad/catedra/{id}', ['as' => 'catedra', 'uses' => 'CathedraController@index']);
Route::get('facultad/catedra/create/{id}', ['as' => 'createCatedra', 'uses' => 'CathedraController@create']);
Route::get('facultad/catedra/modificar/{id}', ['as' => 'updateCatedra', 'uses' => 'CathedraController@edit']);
Route::post('facultad/catedra/modificar/{id}', 'CathedraController@update');
Route::post('facultad/catedra','CathedraController@store');


/*
Route::get('administracion/facultad', function () {
    if(Auth::user()->id_persona == 1){
        return view('administration/university/faculty/index');
    }
    return view('perfil/myPerfil');
});
*/
Route::get('pdf',function(){

    $pdf = PDF::loadView('indexx');
    return $pdf->download('archivo.pdf');

});

// Prueba

Route::get('/iniciar', function () {
    return view('login');
});