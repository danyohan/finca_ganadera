@extends('base-template');
@section('content')
    <h2 style="margin: 20px;text-align: center">EDITAR ANIMAL</h2>
    <form action="{{route('animal.update', $animal )}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col mb-4">
                <button type="button"data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#exampleModal">
                    Reportar enfermedad
                  </button>

            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label for="description">Código</label>
                    <input id="name" name="name" type="text" class="form-control"
                     value="{{old('name', $animal->name)}}"/>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <img src="{{asset('storage/images/'.$animal->path )}}" alt=""/>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-6">
                <div class="form-outline">
                    <label for="description">Raza</label>
                    <select class="form-control" id="race_id" name="race_id">
                        @foreach($races as $race)
                            <option value="{{$race->id}}" {{$race->id == $animal->race_id  ? 'selected' : ''}}>
                                {{$race->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('race_id')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label for="description">Color</label>
                    <select class="form-control" id="color_id" name="color_id">
                        @foreach($colors as $color)
                            <option
                                value="{{$color->id}}" {{$color->id == $animal->color_id  ? 'selected' : ''}}>
                                {{$color->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('color_id')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label for="size">Edad</label>
                    <input type="number" class="form-control" name="age" id="age" value="{{old('age', $animal->age)}}"
                           placeholder="Edad">
                    @error('age')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label for="description">Fecha de nacimiento</label>
                    <input type="date" class="form-control datepicker" name="birth_date" id="birth_date"
                           value="{{old('age', $animal->birth_date)}}">
                    @error('birth_date')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label for="size">Fecha de la muerte</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="form-control datepicker" name="death_date"
                           id="death_date" value="{{old('age', $animal->death_date)}}">
                    @error('death_date')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-group">
                    <label for="size">Peso (kg)</label>
                    <input type="number" class="form-control" name="weight" id="weight"
                           value="{{old('weight', $animal->weight)}}"
                           placeholder="Peso">
                    @error('weight')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label for="description">Tipo</label>
                    <select class="form-control" id="animal_type_id" name="animal_type_id">
                        <option value="">Seleccionar</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{$type->id == $animal->color_id  ? 'selected' : ''}}>
                                {{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('animal_type_id')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-group">
                    <label for="description">Estado</label>
                    <select class="form-control" id="status_id" name="status_id" onchange="">
                        <option value="">Seleccionar</option>
                        @foreach($states as $state)
                            <option value="{{$state->id}}" {{$state->id == $animal->status_id  ? 'selected' : ''}}>
                                {{$state->name}}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="description">Potrero</label>
                    <select class="form-control" id="paddock_id" name="paddock_id">
                        <option value="">Seleccionar</option>
                        @foreach($paddocks  as $paddock)
                            <option
                                value="{{$paddock->id}}" {{$paddock->id == $animal->paddock_id  ? 'selected' : ''}}>
                                {{$paddock->name}}</option>
                        @endforeach
                    </select>
                    @error('paddock_id')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/animal" class="btn btn-primary">Cancelar</a>



        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>

        </div>
      </div>
    </div>
  </div>

    </form>
@stop
