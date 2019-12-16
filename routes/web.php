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

$data['peliculas'] = [
    ["titulo" => "Harry Potter 1"],
    ["titulo" => "Harry Potter 2"],
    ["titulo" => "Harry Potter 3"]
];
$data2 = [];
$data2['peliculas'] = ["Aquaman", "He-Man", "Superman 8" ];


Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function() {

    $data = [];
    $data['nombre'] = "Gaston";
    $data['apellido'] = "Fontaine";

    $data['peliculas'];

    return view('auth.registro.registro', $data);
});

Route::get('/sumar/{n1}/{n2}', function ($n1, $n2) {
    $resultado = $n1 + $n2;
    return $resultado;
});

Route::get('/par/{n1}', function ($n1) {
    if($n1 % 2) {
        return "El numero es impar";
    }
    return "Es par!";
});

Route::get('/peliculas', function() {
    $data2['peliculas'] = ["Aquaman", "He-Man", "Superman 8" ];
    return view('peliculas', $data2);
});

Route::get('/pelicula/{id}', function($id) {
    $list = array(
        array('nombre' => "Aquaman", 'rating' => 8),
        array('nombre' => "He-Man", 'rating' => 2),
        array('nombre' => "Superman 8", 'rating' => 5)
    );
    if(key_exists($id, $list)) {
        $peli['peli'] = $list[$id];
    } else {
        $peli['peli'] = '';
    }

    return view('pelicula', $peli);
});


Route::get('/actors', 'ActorController@directory')->name('actorsList'); // Buscador
Route::get('/actor/{id}', 'ActorController@show')->name('detalleActor'); // Ficha Actor
Route::post('/actors/search', 'ActorController@search')->name('searchActors'); // Resultado buscador

/** ADD Actor */
Route::get('/actors/add', 'ActorController@create')->name('addActor');
Route::post('/actors/add', 'ActorController@store')->name('saveActor');

/** EDIT Actor */
Route::get('/actors/edit/{id}', 'ActorController@edit')->name('actorEdit');
Route::put('/actors/edit/{id}', 'ActorController@edit')->name('actorEdit');

/* MOVIES */
Route::get('/movies', 'ActorController@directory')->name('actorsList'); // Listado

/*Route::get('/addpelicula', function (){
    return view('saveMovieWithFetch');
});*/

Route::get('/addpelicula', 'MovieController@showJson')->name('movieAdd');
Route::post('/addpelicula', 'MovieController@store')->name('movieSave');


