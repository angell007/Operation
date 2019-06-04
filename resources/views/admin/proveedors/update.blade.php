@extends('laracrud::layouts.modal')

@section('title', 'Update Proveedor')
@section('content')
    <form method="POST" action="{{ route('admin.proveedors.update', $proveedor->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="row">
                <div class="form-group  col-md-6 ">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $proveedor->name) }}">
                </div>


                    <div class="form-group  col-md-6 ">
                        <label for="nit">Nit</label>
                        <input type="text" name="nit" id="nit" class="form-control" value="{{ old('nit', $proveedor->nit) }}">
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $proveedor->direccion) }}">
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad',$proveedor->ciudad) }}">
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label for="telefono">Telefono</label>
                        <input type="phone" name="telefono" id="telefono" class="form-control" value="{{ old('telefono',$proveedor->telefono) }}">
                    </div>
                    <div class="form-group  col-md-6 ">
                            <label for="telefono_opcional">Telefono opcional</label>
                            <input type="phone" name="telefono_opcional" id="telefono_opcional" class="form-control" value="{{ old('telefono_opcional',$proveedor->telefono_opcional) }}">
                    </div>

                <div class="form-group  col-md-12 ">
                        <label for="descripcion">Descipcion</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control" >{{old('descripcion', $proveedor->descripcion) }}</textarea>
                    </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
    </form>
@endsection
