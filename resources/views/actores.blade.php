@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-md-12">

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
            <div class="list-group-item list-group-item-action">
            <a href="{{ route('detalleActor', $item->id) }}">{{ $item->getNombreCompleto() }}</a>
            <a class="btn btn-outline-primary float-right" href="{{ route('actorEdit', $item->id) }}">Editar</a>
            </div>
        @endforeach
        </div>
    </div>
</div>
@stop
