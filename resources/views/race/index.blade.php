@extends('base-template');

@section('content')
    <a href="race/create" class="btn btn-primary">Crear</a>
  <table class="table table-striped mt-4">
      <thead>
      <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
      </tr>
      </thead>
      <tbody>
      @foreach($races as $race)
          <tr>
              <td>{{$race->id}}</td>
              <td>{{$race->name}}</td>
              <td>
                  <form action="{{ route('race.destroy',$race->id) }}" method="POST">
                      <a href="/race/{{$race->id}}/edit" class="btn btn-info">Editar</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
@stop
