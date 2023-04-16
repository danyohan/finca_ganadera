@extends('base-template');
@section('content')
    <h2>EDITAR REGISTROS</h2>

    <form action="/paddocks/{{$paddock->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input id="name" name="name" type="text" class="form-control" value="{{$paddock->name}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tamaño</label>
            <input id="size" name="size" type="number" step="any" class="form-control" value="{{$paddock->size}}">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/paddocks" class="btn btn-danger">Cancelar</a>

    </form>
@stop
