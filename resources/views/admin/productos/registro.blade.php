@extends('laracrud::layouts.modal')
@section('title', 'Registrar Producto')
@section('content')
        <form method="POST" action="{{ route('admin.productos.create') }}" data-ajax-form>
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Factura de referencia </label>
                        <input type="number" class="form-control" name="factura_id" placeholder="Factura de Referencia"
                        value="{{ old('email') }}">
                    </div>
                    @if (isset($proveedores))
                    <div class="form-group col-md-6">
                        <label>Cod de proveedor </label>
                        <select class="form-control" name="proveedor_id" id="proveedor_id" onchange="cambio()">
                            <option disabled selected> Choose...</option>
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
                <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Numero de parte "
                value="{{ old('referencia') }}">
            </div>
            <div class="form-group col-md-6">
                <label> Costo sin iva </label>
                <input type="number" class="form-control" id="costo_sin_iva" name="costo_sin_iva" onkeyup="calcular()" placeholder=""
                value="{{ old('costo_sin_iva') }}">
            </div>
            <div class="form-group col-md-6">
                <label> iva </label>
                <input type="number" class="form-control" name="iva" id="iva" placeholder="iva" onkeyup="calcular()"
                value="{{ old('iva') }}">
            </div>

            <div class="form-group col-md-6">
                <label> Cantidad </label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad "
                value="{{ old('cantidad') }}">
            </div>

            <div class="form-group col-md-6">
                <label> Costo con iva</label>
                <input class="form-control" name="costo_con_iva" id="costo_con_iva" readonly>
            </div>

            <div class="form-group col-md-12">
                <label> Descripcion </label>
                <textarea name="descripcion" type="text" class="form-control" value="{{ old('descripcion') }}">
                </textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-round btn-primary">Save</button>
                <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>
@endsection
