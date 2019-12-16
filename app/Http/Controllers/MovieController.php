<?php

namespace App\Http\Controllers;

use App\Genres;
use App\Movies;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /*public function directory() {
        return view('actores');
    }*/

    public function directory() {

        $list = Movies::orderby('title')->get();
        return view('peliculas', compact('list'));
    }

    public function show($id) {
        $actor = Movies::find($id);

        $data = array();
        $data['info'] = $actor->getAttributes();
        $data['nombre'] = $actor->getNombreCompleto();

        return view('actor', $data);
    }

    public function search(Request $busca) {
        $query = $busca['busca'];
        $actors['list'] = Actors::where('first_name', 'LIKE', "{$query}%")->get();
        return view('buscador', $actors);
    }

    public function create() {
        $data = [];
        $data['pelis'] = Movies::all();
        $data['pagetitle'] = "Agregar Película";
        return view('actors.add', $data);
    }

    public function edit($id) {
        $data = [];
        $data['genres'] = Genres::all();
        $data['movie'] = Movies::find($id);
        return view('saveMovieWithFetch', $data);
    }

    public function store(Request $fields) {

        /*$reglas = [
            'first_name' => 'required|string|min:5'
        ];
        $fields->validate($reglas);*/

        //$movie = Movies::create($fields->all()); //Shortcut

        $movie = new Movies();
        $movie->fill($fields->all());
        $movie->save();

        return redirect('movies');
    }

    public function guardarPelicula(Request $fields) {
        $data = $fields->all();
        $pelicula = new Movies();
        $pelicula->save();

        //return response()->json(['status' => "ok"], 500);


        $movie = new Movies();
        $movie->fill($fields->all());
        $movie->save();

        return redirect('movies');
    }

    public function update($id, Request $request) {

        //$actor = Actors::find($id)->update($request->all()); //Shortcut

        $actor = Actors::find($id);
        $actor-> fill($request->all());
        $actor->save();

        return view('actors');
    }

    public function showJson() {
        $data = [];
        $data['pagetitle'] = "Agregar Película";
        return view("saveMovieWithFetch", $data);
    }
}
