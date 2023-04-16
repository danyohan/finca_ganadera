@extends('base-template')

@section('content')
    <a href="animal/create" class="btn btn-primary mt-2">Crear</a>
  <table class="table table-striped mt-4">
      <thead>
      <tr>
          <th scope="col">ID</th>
          <th scope="col">Código</th>
          <th scope="col">Raza</th>
          <th scope="col">Color</th>
          <th scope="col">Edad</th>
          <th scope="col">Peso (kg)</th>
          <th scope="col">Acciones</th>
      </tr>
      </thead>
      <tbody>
      @foreach($animals as $animal)
          <tr>
              <td>{{$animal->id}}</td>
              <td>{{$animal->name}}</td>
              <td>{{$animal->race}}</td>
              <td>{{$animal->color_name}}</td>
              <td>{{$animal->age}}</td>
              <td>{{$animal->weight}}</td>
              <td>
                  <form action="{{ route('animal.destroy',$animal->id) }}" method="POST">
                      <a href="/animal/{{$animal->id}}/edit" class="btn btn-info">Editar</a>
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
    {!! $animals->links() !!}
  </div>
@stop
