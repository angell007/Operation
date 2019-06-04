@extends('laracrud::layouts.modal')
@section('title', 'Update Producto')
@section('content')
<form method="POST" action="{{ route('admin.productos.update', $producto->id) }}" data-ajax-form>
    @csrf
    @method('PATCH')

    <div class="modal-body">

        <div class="row">
            <div class="form-group col-md-6">
                <label> Factura de referencia </label>
                <input type="number" class="form-control" name="factura_id" placeholder=" Factura de Referencia "
                    value="{{ old('factura_id',  $producto->factura_id) }}">
            </div>

            <div class="form-group col-md-6">
                    <label> Nombre de producto </label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre de parte"
                        value="{{ old('name',  $producto->name) }}">
                </div>

            @if (isset($proveedores))
            <div class="form-group col-md-6">
                <label>Cod de proveedor </label>
                <select class="form-control" name="proveedor_id" id="proveedor_id" onchange="cambio()">
                    <option selected="true" value="{{ $producto->proveedor->id }}">{{ $producto->proveedor->name }}
                        @foreach ($proveedores as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}
                    </option>
                    @endforeach
                </select>
                <span class="label" style="font-size: 1rem; display:none;" id="lblpro"> </span>
            </div>
            @else
            <div class="form-group col-md-6">
                <label>Cod de proveedor </label>
                <input type="text" class="form-control" name="proveedor_id" value="{{ old('proveedor_id') }}">
            </div>
            @endif

            <div class="form-group col-md-6">
                <label for="Numero de parte "> Numero de parte  </label>
                <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Numero de parte"
                    value="{{ old('referencia', $producto->referencia) }}">
            </div>

            <div class="form-group col-md-6">
                <label> Costo de ingreso </label>
                <input type="number" class="form-control" id="costo_con_iva" name="costo_con_iva"
                    value={{ old('costo_con_iva', $producto->costo_con_iva) }}>
            </div>

            <div class="form-group col-md-6">
                <label> Cantidad disponible </label>
                <input type="number" class="form-control" id="cantidad" name="cantidad"
                    value={{ old('cantidad', $producto->cantidad) }}>
            </div>

            <div class="form-group col-md-12">
                <label> Descripcion </label>
                <textarea name="descripcion" type="text"
                    class="form-control">{{old('descripcion', $producto->descripcion)}}</textarea>
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
</form>
@endsection
