@extends('laracrud::layouts.modal')

@section('title', 'Registrar Cliente')
@section('content')
    <form method="POST" action="{{ route('admin.clientes.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                        <label> Nombres </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Apellidos </label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Last Name">
                    </div>

                    <div class="form-group col-md-6">
                            <label>Tipo de Identificación</label>
                            <select class="form-control" name="tipo_identificacion" id="tipo_identificacion">
                                <option> Choose...</option>
                                <option value="Cedula">Cedula</option>
                                <option value="Passport">Passport</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label># Identificacion</label>
                            <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                                <label> Sexo </label>
                                <select class="form-control" name="sexo" id="sexo" >
                                    <option disabled selected> Choose...</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                    <option value="Otro">Otro</option>

                                </select>
                            </div>

                    <div class="form-group col-md-6">
                        <label>Mail </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>


                    <div class="form-group col-md-6">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Departamento</label>
                        <input type="text" class="form-control" id="de´partamento" name="departamento" placeholder="Dpyo">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Address">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tipo de Vivienda </label>
                        <select class="form-control" name="tipo_casa"  id="tipo_casa">
                            <option disabled selected> Choose...</option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Edificio">Edificio</option>

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Barrio</label>
                        <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Barrio">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Telefono</label>
                        <input type="phone" class="form-control" id="telefono" name="telefono" placeholder="phone">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Telefono (opcional)</label>
                        <input type="phone" class="form-control" id="opcional_telefono" name="opcional_telefono" placeholder="phone(opcional)">
                    </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
