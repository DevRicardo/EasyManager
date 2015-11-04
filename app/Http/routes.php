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

    $organizacion = \App\Organizacion::find(1);
    $portadas = \App\Portada::all();
    $colaboradores = \App\Colaborador::all();

    $datos_portada = null;
    foreach($portadas AS $portada){
        $datos_portada = $portada;
    }

    return view('index')
        ->with("parametros",
            [
                "organizacion"=>$organizacion,
                "portada"=>$datos_portada,
                "colaboradores" => $colaboradores
            ]);
});

// RUTAS PARA AUTENTICACION
Route::resource('login', 'Auth\LoginController');
Route::get('logout','Auth\LoginController@logout');


//RUTAS PARA LA ORGANIZACION
Route::resource('admin/organizacion','org\OrganizacionController');

//RUTAS PARA LOS COLABORADORES
Route::resource('admin/colaborador','org\ColaboradorController');

//RUTAS PARA LAS NOTICIAS
Route::resource('admin/noticia','org\NoticiaController');

// RUTAS PARA EL MANEJO DE USUARIOS
Route::resource('usuario', 'UserController');

//RUTAS PARA LOS PROGRAMAS
Route::resource('admin/programa','org\ProgramaController');


Route::resource('admin/portada','org\PortadaController');


Route::resource('admin/voluntario','org\VoluntarioController');


// RUTA PANTALLA PRINCIPAL DEL MANAGER
Route::get('admin/manager',function(){
    if(Auth::check()) {
        return view('admin.manager');
    }else{
        return \Illuminate\Support\Facades\Redirect::to('login');
    }
});