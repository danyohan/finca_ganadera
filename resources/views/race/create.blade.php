@extends('base-template');
@section('content')
    <h2 style="margin: 20px;text-align: center">CREAR RAZA</h2>
    <form action="/race" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Nombre</label>
            <input type="text" class="form-control" id="name"  name="name" placeholder="Nombre">
            @error('name')
            <smlall>{{$message}}</smlall>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/paddocks" class="btn btn-danger">Cancelar</a>
    </form>
@stop
