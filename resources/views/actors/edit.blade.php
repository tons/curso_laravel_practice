@extends('layouts.base')

@section('content')
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('actorEdit', $actor->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="..." value="{{ $actor->first_name }}">
            </div>
            <div class="form-group">
                <label for="">Apellido:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="..." value="{{ $actor->last_name }}">
            </div>
            <div class="form-group">
                <label for="">Rating:</label>
                <input type="text" class="form-control" name="rating" id="rating" placeholder="..." value="{{ $actor->rating }}">
            </div>
            <div class="form-group">
                <label for="">Película favorita:</label>
                <select class="form-control" name="favorite_movie_id" id="">
                    <option value="" disabled>Seleccione opción..</option>
                    @foreach($pelis as $item)
                        <option value="{{ $item->id }}" {{ ( $item->id == $actor->favorite_movie_id) ? 'selected="selected"' : '' }}> {{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Actor</button>
        </form>
    </div>
@stop
