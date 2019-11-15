@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="title m-b-md">Actor: {{ $nombre }}</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <ul>
                {{--<li>{{ $actor->rating }}</li>
                <li>{{ $actor->favorite_movie_id }}</li>
                <li>{{ $actor->created_at }}</li>
                <li>{{ $actor->updated_at }}</li>--}}

                @foreach($info as $key => $value)
                    <li>{{ $key }}: {{ $value }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <a href="http://localhost/curso/public/actores" class="btn btn-outline-danger">< Volver al listado</a>
        </div>
    </div>
@stop


