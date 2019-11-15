@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="title m-b-md">Actores</h1>
            <hr>
            <form action="{{ route('searchActors') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Buscar Actor:</label>
                    <input type="text" class="form-control" name="busca" id="busca" placeholder="Buscar actores...">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div class="col-md-12 mt-4">
            <div class="list-group">
                @foreach($list as $item)
                    <a class="list-group-item list-group-item-action" href="{{ route('detalleActor', $item->id) }}">{{ $item->getNombreCompleto() }}</a>
                @endforeach
            </div>
        </div>
    </div>
@stop
