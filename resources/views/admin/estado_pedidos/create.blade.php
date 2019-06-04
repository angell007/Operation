@extends('laracrud::layouts.modal')

@section('title', 'Registrar EstadoPedido')
@section('content')
    <form method="POST" action="{{ route('admin.estado_pedidos.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}"> </textarea>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
