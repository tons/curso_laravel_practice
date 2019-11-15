<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actors;

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
}
