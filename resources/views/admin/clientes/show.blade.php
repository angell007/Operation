
@extends('laracrud::layouts.auth')

@section('title', 'Clientes')
@section('child-content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3> Cliente </h3>
    </div>
</div>

    <form action="{{ route('admin.clientes.update', $cliente->id) }}" method="POST"  data-ajax-form>
        @csrf
            {{ csrf_field() }}
            @method('PATCH')

        <div class="row">
            <div class="form-group col-md-3">
                <label> Nombres </label>
                <input type="text" class="form-control" name="name" placeholder="Name"
                value="{{ $cliente->name }} ">
            </div>
            <div class="form-group col-md-3">
                <label>Apellidos </label>
                <input type="text" class="form-control" name="apellido" placeholder="Last Name"
                value="{{ $cliente->apellido }} ">
            </div>

            <div class="form-group col-md-6">
                <label>Mail </label>
                <input type="email" class="form-control" name="email" placeholder="E-mail"
                value="{{ $cliente->email }} ">
            </div>

            <div class="form-group col-md-3">
                <label>Tipo de Identificación</label>
                <select class="form-control" name="tipo_identificacion">
                    <option value="{{ $cliente->tipo_identificacion }}"> {{ $cliente->tipo_identificacion }}  </option>
                    <option value="Cedula">Cedula</option>
                    <option value="Passport">Passport</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label>Numero de Identificacion</label>
                <input type="text" class="form-control" name="identificacion"
                value="{{ $cliente->identificacion }} ">
            </div>

            <div class="form-group col-md-3">
                    <label> Sexo </label>
                    <select class="form-control" name="sexo"  >
                        <option value="{{ $cliente->sexo }} ">{{ $cliente->sexo }} </option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>

                    </select>
                </div>

                <div class="form-group col-md-3">
                        <label>Tipo de Vivienda </label>
                        <select class="form-control" name="tipo_casa"  >
                            <option value=" {{ $cliente->tipo_casa }}"> {{ $cliente->tipo_casa }} </option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Edificio">Edificio</option>

                        </select>
                    </div>

            <div class="form-group col-md-6">
                <label>Ciudad</label>
                <input type="text" class="form-control" name="ciudad" placeholder="text"
                value="{{ $cliente->ciudad}} ">
            </div>

            <div class="form-group col-md-6">
                <label>Departamento</label>
                <input type="text" class="form-control" name="departamento" placeholder="text"
                value="{{ $cliente->departamento }} ">
            </div>

            <div class="form-group col-md-6">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion" placeholder="text"
                value="{{ $cliente->direccion }} ">
            </div>

            <div class="form-group col-md-6">
                <label>Barrio</label>
                <input type="text" class="form-control" name="barrio" placeholder="Barrio"
                value="{{ $cliente->barrio }} ">

            </div>

            <div class="form-group col-md-3">
                <label>Telefono</label>
                <input type="phone" class="form-control" name="telefono" placeholder="phone"
                value="{{ $cliente->telefono }} ">
            </div>

            <div class="form-group col-md-3">
                <label>Telefono (opcional)</label>
                <input type="phone" class="form-control" name="opcional_telefono" placeholder="phone(opcional)"
                value="{{ $cliente->opcional_telefono }} ">
            </div>

            <div class="form-group col-md-6">
                    <label>(Opcional)</label>
                <button type="submit" class="form-control btn btn-dark">Actualizar Cliente</button>
            </div>
        </div>
    </form>

    <div class="form-group col-md-12" style="background-color:#f3f3f3; font-size: 2.3rem;">
            <table>
                <tr>
                    <th class="text text-default">
                        <span>
                            Servicios del cliente !!
                        </span>
                    </th>
                </tr>
            </table>
        </div>


    <div class="card">
        <div class="card-body">
            {!! $html->table() !!}
        </div>
    </div>
@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush
