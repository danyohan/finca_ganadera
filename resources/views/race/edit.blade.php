@extends('base-template');
@section('content')
    <h2>EDITAR REGISTROS</h2>
    <form action="{{route('race.update', $races )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control"  value="{{old('name', $races->name)}}">
            @error('name')
            <smlall>{{$message}}</smlall>
            @enderror
        </div>

        <a href="/race" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
