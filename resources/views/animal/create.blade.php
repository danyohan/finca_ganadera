@extends('base-template');
@section('content')
    <h2 style="margin: 20px;text-align: center">CREAR ANIMAL</h2>
    <form action="/animal" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label for="description">Imagen</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label for="description">Código</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label for="description">Raza</label>
                    <select class="form-control" id="race_id" name="race_id">
                        <option value="">Seleccionar</option>
                        @foreach($races as $race)
                            <option value="{{$race->id}}">{{$race->name}}</option>
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
                        <option value="">Seleccionar</option>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
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
                    <input type="number" class="form-control" name="age" id="age" value="{{old('weight')}}"
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
                           value="{{old('birth_date')}}">
                    @error('birth_date')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label for="size">Fecha de la muerte</label>
                    <input type="date" placeholder="dd-mm-yyyy" class="form-control datepicker" name="death_date"
                           id="death_date" value="{{old('death_date')}}">
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
                    <input type="number" class="form-control" name="weight" id="weight" value="{{old('weight')}}"
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
                            <option value="{{$type->id}}">{{$type->name}}</option>
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
                    <select class="form-control" id="status_id" name="status_id">
                        <option value="">Seleccionar</option>
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                    <smlall>{{$message}}</smlall>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="description">Protrero</label>
                    <select class="form-control" id="paddock_id" name="paddock_id">
                        <option value="">Seleccionar</option>
                        @foreach($paddocks  as $paddock)
                            <option value="{{$paddock->id}}">{{$paddock->name}}</option>
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
    </form>
@stop
