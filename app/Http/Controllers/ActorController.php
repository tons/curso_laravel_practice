<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Actors;
use App\Movies;

class ActorController extends Controller
{
    /*public function directory() {
        return view('actores');
    }*/

    public function directory() {
        $list = Actors::orderby('first_name')->get();
        return view('actores', compact('list'));
    }

    public function show($id) {
        $actor = Actors::find($id);

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
        return view('actors.add', $data);
    }

    public function edit($id) {
        $data = [];
        $data['pelis'] = Movies::all();
        $data['actor'] = Actors::find($id);
        return view('actors.edit', $data);
    }

    public function store(Request $fields) {

        $reglas = [
            'first_name' => 'required|string|min:5'
        ];

        $fields->validate($reglas);

        //$actor = Actors::create($fields->all()); //Shortcut

        $actor = new Actors();
        $actor->fill($fields->all());
        $actor->save();

        return redirect('actors');
    }

    public function update($id, Request $request) {

        //$actor = Actors::find($id)->update($request->all()); //Shortcut

        $actor = Actors::find($id);
        $actor-> fill($request->all());
        $actor->save();

        return view('actors');
    }
}
