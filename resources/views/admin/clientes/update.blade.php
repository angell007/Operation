@extends('laracrud::layouts.modal')

@section('title', 'Update Cliente')
@section('content')
    <form method="POST" action="{{ route('admin.clientes.update', $cliente->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
                <label> Nombres </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $cliente->name) }}">
            </div>

            <div class="form-group col-md-6">
                <label> Apellidos </label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="{{ old('apellido', $cliente->apellido) }}">
            </div>

            <div class="form-group col-md-6">
                    <label>Tipo de Identificación</label>
                    <select class="form-control" name="tipo_identificacion" id="tipo_identificacion">
                        <option  selected value="{{$cliente->tipo_identificacion}}" > {{ old('tipo_identificacion', $cliente->tipo_identificacion) }} </option>
                        <option value="Cedula">Cedula</option>
                        <option value="Passport">Passport</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label># Identificacion</label>
                    <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Identificacion" value="{{ old('identificacion', $cliente->identificacion) }}">
                </div>

        <div class="form-group col-md-6">
                <label> Sexo </label>
                <select class="form-control" name="sexo" id="sexo" >
                    <option selected  value="{{$cliente->sexo}}"> {{ old('sexo', $cliente->sexo) }}  </option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Mail </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email', $cliente->email) }}">
            </div>

            <div class="form-group col-md-6">
                <label>Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="{{ old('ciudad', $cliente->ciudad) }}">
            </div>

            <div class="form-group col-md-6">
                <label>Departamento</label>
                <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Dpto" value="{{ old('departamento', $cliente->departamento) }}">
            </div>

            <div class="form-group col-md-6">
                <label>Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Address" value="{{ old('direccion', $cliente->direccion) }}">
            </div>

            <div class="form-group col-md-6">
                <label>Tipo de Vivienda </label>
                <select class="form-control" name="tipo_casa"  id="tipo_casa">
                    <option selected value="{{$cliente->tipo_casa}}"> {{ old('tipo_casa', $cliente->tipo_casa) }} </option>
                    <option value="Casa">Casa</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Edificio">Edificio</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Barrio</label>
                <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio" value="{{ old('barrio', $cliente->barrio) }}">
            </div>

            <div class="form-group col-md-3">
                <label>Telefono</label>
                <input type="phone" class="form-control" id="telefono" name="telefono" placeholder="Phone" value="{{ old('telefono', $cliente->telefono) }}">
            </div>

            <div class="form-group col-md-3">
                <label>Telefono (opcional)</label>
                <input type="phone" class="form-control" id="opcional_telefono" name="opcional_telefono" placeholder="phone(opcional)" value="{{ old('opcional_telefono', $cliente->opcional_telefono) }}">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
