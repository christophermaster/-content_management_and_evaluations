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
/**
 * Pruebas
 */

Route::get('otros/ejercicios', function () {
    return view('ejercicio/todoLosEjercicios/ejercicios');
});
Route::get('gestion/solucion', function () {
    return view('gestion/solucion/solucion');
});

Route::get('create', function () {
    return view('gestion/ejercicio/create');
});
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
Route::Resource('mi/perfil', 'MiPerfilController');


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

/**
 * Materia
 */
Route::get('facultad/materia/{id}', ['as' => 'materia', 'uses' => 'MatterController@index']);
Route::get('facultad/materia/create/{id}', ['as' => 'createMateria', 'uses' => 'MatterController@create']);
Route::get('facultad/materia/modificar/{id}', ['as' => 'updateMateria', 'uses' => 'MatterController@edit']);
Route::post('facultad/materia/modificar/{id}', 'MatterController@update');
Route::post('facultad/materia','MatterController@store');

/**
 * Modulo
 */
Route::get('facultad/modulo/{id}', ['as' => 'modulo', 'uses' => 'ModuleController@index']);
Route::get('facultad/modulo/create/{id}', ['as' => 'createModulo', 'uses' => 'ModuleController@create']);
Route::get('facultad/modulo/modificar/{id}', ['as' => 'updateModulo', 'uses' => 'ModuleController@edit']);
Route::post('facultad/modulo/modificar/{id}', 'ModuleController@update');
Route::post('facultad/modulo','ModuleController@store');

/**
 * Temas
 */
Route::get('facultad/tema/{id}', ['as' => 'tema', 'uses' => 'TopicController@index']);
Route::get('facultad/tema/create/{id}', ['as' => 'createTema', 'uses' => 'TopicController@create']);
Route::get('facultad/tema/modificar/{id}', ['as' => 'updateTema', 'uses' => 'TopicController@edit']);
Route::post('facultad/tema/modificar/{id}', 'TopicController@update');
Route::post('facultad/tema','TopicController@store');

/**
 * Contenido
 */
Route::get('facultad/contenido/{id}', ['as' => 'contenido', 'uses' => 'ContentController@index']);
Route::get('facultad/contenido/create/{id}', ['as' => 'createContenido', 'uses' => 'ContentController@create']);
Route::get('facultad/contenido/modificar/{id}', ['as' => 'updateContenido', 'uses' => 'ContentController@edit']);
Route::post('facultad/contenido/modificar/{id}', 'ContentController@update');
Route::post('facultad/contenido','ContentController@store');

/**
 * Administraccion de usuario 
 */
Route::resource('facultad/profe','AdminUserController');

/**
 * select
 */
Route::get('/school/{id}','AdminUserController@getSchool');
Route::get('/cathedra/{id}','AdminUserController@getCathedra');
Route::get('/matter/{id}','AdminUserController@getMatter');
Route::get('/topic/{id}','AdminUserController@getTopic');
Route::get('/content/{id}','AdminUserController@getContent');

 /**
  * Gestion de ejercicio 
  */
/**
 * vista de publicaciones 
 */
//vista de inicio de mi publicaciones 
Route::get('gestion/contenido/mis/publicaciones','ExerciseController@todosMisEjercicios');
//vista de mis ejercicios 
Route::get('gestion/contenido/mis/publicaciones/ejercicios', ['as' => 'soloEjercicio', 'uses' => 'ExerciseController@soloEjercicios']);
//detalles de mis ejercicios 
Route::get('gestion/contenido/mis/publicaciones/ejercicios/detalles/{id}', ['as' => 'detallesEjercicio', 'uses' => 'ExerciseController@detallesDeEjercicios']);
//editar ejercicios
Route::get('gestion/contenido/mis/publicaciones/ejercicios/detalles/editar/{id}', ['as' => 'editarEjercicio', 'uses' => 'ExerciseController@edit']);
Route::post('gestion/contenido/mis/publicaciones/ejercicios/detalles/editar/{id}', ['as' => 'editarEjercicio', 'uses' => 'ExerciseController@update']);
//eliminar mis ejercicios
Route::get('gestion/contenido/mis/publicaciones/ejercicios/eliminar/{id}','ExerciseController@destroy');
//TODO pendiente de revisar
Route::resource('gestion/ejercicio','ExerciseController');


/**Subida de archivos  */
Route::get('gestion/contenido/materiales/digitalizados/subir',['as'=>'imageUpload', 'uses'=>'UploadController@upload']);
Route::put('imageUpload',['as'=>'imageUpload','uses'=>'UploadController@uploadd']);

/**PAntalla de inicio  */
Route::get('gestion/contenido/materiales/digitalizados',['as'=>'materialDigitalizado','uses'=>'UploadController@index']);
Route::get('gestion/contenido/mis/materiales/digitalizados/',['as'=>'misMaterialDigitalizado','uses'=>'UploadController@miMaterialDigitalizado']);
Route::get('ejercicos/soluciones/digitalizados',['as'=>'repositorioEjerSol','uses'=>'ExerciseController@todosLosEjercicios']);
/** Descargar Archivo*/
Route::get('download/{id}', ['as' => 'downloadFile', 'uses' => 'UploadController@downloadFile']);

/*Solucion */
Route::get('solucion/{id}', ['as' => 'agregarSolucion', 'uses' => 'SolutionController@create']);
Route::post('solucion/save','SolutionController@store');
Route::get('solucion/delete/{id}','SolutionController@destroy');
Route::get('solucion/modificar/{id}', ['as' => 'solutionEditar', 'uses' => 'SolutionController@edit']);
Route::post('solucion/modificar/{id}', 'SolutionController@update');
Route::get('gestion/contenido/resumen/soluciones',['as' => 'misSoluciones', 'uses' => 'SolutionController@index']);


/**evaluacion */
Route::get('generar/evaluacion', ['as' => 'generarEvaluacion', 'uses' => 'EvaluationController@index']);
Route::post('salvar/evaluacion','EvaluationController@create');
Route::get('crear/evaluacion/{id}', ['as' => 'evaluacion', 'uses' => 'EvaluationController@crearEvaluacion']);
Route::get('editar/evaluacion/{id}', ['as' => 'editarEvaluacion', 'uses' => 'EvaluationController@editarEvaluacion']);
Route::post('agregar/ejercicio','EvaluationController@agregarEjercicio');
Route::get('evaluacion/delete/{id}','EvaluationController@eliminarParcial');
Route::post('evaluacion/modificar/{id}','EvaluationController@modificarParcial');
Route::get('gestion/contenido/evaluacion/generada/{id}', ['as' => 'vistaEvaluacion', 'uses' => 'EvaluationController@generarEvaluacion']);
Route::get('ejercicio/elejido/parcial/{id}/{idt}','EvaluationController@quitarEjercicio');
Route::get('gestioni/contenido/todas/evaluaciones','EvaluationController@listarTodasLasEvaluaciones');
Route::get('gestion/contenido/mis/pulicaciones/mis/evaluaciones','EvaluationController@misEvaluaciones');
Route::get('gestion/contenido/mis/pulicaciones/mis/evaluaciones/detalles/{id}',['as' => 'detallesEvaluacion', 'uses' =>'EvaluationController@detalles']);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * favoritos
 */
Route::post('favorito/ejercicio/{id}', ['as' => 'favoritoEjercicio', 'uses' => 'FavoriteController@agregarFavoriteEjercicio']);
Route::post('favorito/solucion/{id}', ['as' => 'favoritoSolucion', 'uses' => 'FavoriteController@agregarFavoriteSolucion']);
Route::post('favorito/archivos/{id}', ['as' => 'favoritoSolucion', 'uses' => 'FavoriteController@agregarFavoriteArchivo']);
//Vista de Favoritos*/
Route::get('gestion/contenido/mis/favoritos','FavoriteController@favorito');
//qui de favoritos
Route::get('quitar/favorito/{id}', ['as' => 'quitarFavoritoEjercicio', 'uses' => 'FavoriteController@quitarFavorite']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Historia de los usarios 
 */
Route::get('gestion/contenido/historicos/ejercicios/archivos','HistoryExerciseController@index');
Route::post('gestion/contenido/historicos/ejercicios/archivos/actualizar/fecha/{id}','HistoryExerciseController@actualizarFecha');
Route::post('gestion/contenido/historicos/ejercicios/archivos/usar/{id}','HistoryExerciseController@usarEjercicio');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');

