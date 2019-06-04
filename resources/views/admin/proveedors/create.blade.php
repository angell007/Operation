@extends('laracrud::layouts.modal')

@section('title', 'Registrar Proveedor')
@section('content')
<form method="POST" action="{{ route('admin.proveedors.create') }}" data-ajax-form>
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="nit">Nit</label>
                <input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="telefono">Telefono</label>
                <input type="phone" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
            </div>
            <div class="form-group col-md-6">
                    <label for="telefono_opcional">Telefono opcional</label>
                    <input type="phone" name="telefono_opcional" id="telefono_opcional" class="form-control" value="{{ old('telefono_opcional') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="descripcion">Descripción</label>
                <textarea rows="4" name="descripcion" id="descripcion" class="form-control text" cols="50" onclick="this.focus();this.select()"
                    value="{{ old('descripcion') }}"></textarea>
            </div>
        </div>
        {{-- readonly="readonly --}}
        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</form>
@endsection
