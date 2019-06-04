@extends('laracrud::layouts.modal')

@section('title', 'Update EstadoPedido')
@section('content')
    <form method="POST" action="{{ route('admin.estado_pedidos.update', $estado_pedido->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $estado_pedido->name) }}">
                </div>

                <div class="form-group">
                        <label for="descripcion">Descipcion</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control" >{{old('descripcion', $estado_pedido->descripcion) }}</textarea>
                    </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
