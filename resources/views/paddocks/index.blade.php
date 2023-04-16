@extends('base-template');

@section('content')
    <a href="paddocks/create" class="btn btn-primary">Crear</a>
  <table class="table table-striped mt-4">
      <thead>
      <tr>
          <th scope="col">ID</th>
          <th scope="col">Descripción</th>
          <th scope="col">Tamaño</th>
          <th scope="col">Acciones</th>
      </tr>
      </thead>
      <tbody>
      @foreach($paddocks as $paddock)
          <tr>
              <td>{{$paddock->id}}</td>
              <td>{{$paddock->name}}</td>
              <td>{{$paddock->size}}</td>
              <td>
                  <form action="{{ route('paddocks.destroy',$paddock->id) }}" method="POST">
                      <a href="/paddocks/{{$paddock->id}}/edit" class="btn btn-info">Editar</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
  <div class="card.footer">
    {!! $paddocks->links() !!}
  </div>
@stop
