@extends('laracrud::layouts.modal')

@section('title', 'Registrar Articulo')
@section('content')
<form method="POST" action="{{ route('admin.articulos.create', $articulo) }}" data-ajax-form>
    @csrf
    <div class="modal-body">
        <div class="row">

            <div class="form-group col-md-6">
                <label> Marca </label>
                <input id="marca" type="text" class="form-control" name="marca" placeholder="Marca">
            </div>

            <div class="form-group col-md-6">
                <label> Modelo </label>
                <input id="modelo" type="text" class="form-control" name="modelo" placeholder="Modelo">
            </div>

            <div class="form-group col-md-6">
                <label>Tipo de Articulo</label>
                <select id="tipo" class="form-control" name="tipo">
                    <option disabled selected> Choose...</option>
                    <option value="movil">movil</option>
                    <option value="table">table</option>
                    <option value="pc de mesa">pc de mesa</option>
                    <option value="pc portatil">pc portatil</option>
                    <option value="otro">otro</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label> Serie </label>
                <input id="serie"  type="text" class="form-control" name="serie" placeholder="Serie">
            </div>

            <div class="form-group col-md-6">
                <label> Imei </label>
                <input id="imei1" type="text" class="form-control" name="imei1" placeholder="Imei">
            </div>

            <div class="form-group col-md-6">
                <label> Imei (Opcional) </label>
                <input id="imei2" type="text" class="form-control" name="imei2" placeholder="Imei">
            </div>

            <div class="form-group col-md-6">
                <label> Almacen de Procedencia </label>
                <input id="almacen" type="text" class="form-control" name="almacen_compra" placeholder="Almacen de Procedencia">
            </div>

            <div class="form-group col-md-6">
                <label> Numero de factura de procedencia </label>
                <input id="factura" type="number" class="form-control" name="numero_factura_compra"
                    placeholder="Numero de factura de procedencia">
            </div>

            <div class="form-group col-md-6">
                <label> Numero de garantia </label>
                <input id="garantia" type="number" class="form-control" name="numero_vertificado_garantia"
                    placeholder="Numero de garantia">
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</form>
@endsection
