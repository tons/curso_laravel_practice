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
        <form action="" method="post" id="AddForm">
            @csrf
            <div class="form-group">
                <label for="">Titulo:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="..." value="">
            </div>
            <div class="form-group">
                <label for="">Género:</label>
                <select class="form-control" name="genre_id" id="">
                    <option value="" disabled>Seleccione opción..</option>
                    {{--
                    @foreach($genres as $item)
                        <option value="{{ $item->id }}" {{ ( $item->id == $actor->favorite_movie_id) ? 'selected="selected"' : '' }}> {{ $item->title }}</option>
                    @endforeach
                    --}}
                </select>
            </div>
            <div class="form-group">
                <label for="">Rating:</label>
                <input type="text" class="form-control" name="rating" id="rating" placeholder="..." value="">
            </div>
            <div class="form-group">
                <label for="">Awards:</label>
                <input type="text" class="form-control" name="awards" id="rating" placeholder="..." value="">
            </div>
            <div class="form-group">
                <label for="">Duración:</label>
                <input type="text" class="form-control" name="length" id="rating" placeholder="..." value="">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Película</button>
        </form>

            <script type="text/javascript">
                const theForm = document.getElementById('AddForm');
                theForm.addEventListener('submit', function (event) {
                    event.preventDefault();
                    let fields = Array.from(this.elements);
                    const formData = new FormData();
                    /*const enviardatos = fields.map( function (elementos) {
                        return {
                            name: elemento.name,
                            value: elemento.value
                        }
                    });*/
                    fields.map( function (element) {
                        formData.append(element.name, element.value);
                    });
                    console.log(formData);

                    fetch('/formulario', {
                        method: 'POST',
                        ... .... .... .... ... ... ... ... ... ... ... ...
                    })
                })

            </script>
    </div>
@stop
