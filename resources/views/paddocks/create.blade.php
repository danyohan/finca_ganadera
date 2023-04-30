@extends('base-template');
@section('content')
    <h2 style="margin: 20px;text-align: center">CREAR POTRERO</h2>
    <form action="/paddocks" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Nombre</label>
            <input type="text" class="form-control" id="name"  name="name"   placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="size">Tamaño</label>
            <input type="number" class="form-control" name="size" id="size" placeholder="Tamaño">
        </div>
        <div class="form-group">
            <label for="size">Cantidad Animales</label>
            <input type="number" class="form-control" name="animal_number" id="animal_number" placeholder="Cantidad animales">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="submit" class="btn btn-danger">Cancelar</button>
    </form>
@stop
