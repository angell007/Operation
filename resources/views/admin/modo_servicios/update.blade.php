@extends('laracrud::layouts.modal')

@section('title', 'Update ModoServicio')
@section('content')
    <form method="POST" action="{{ route('admin.modo_servicios.update', $modo_servicio->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $modo_servicio->name) }}">
                </div>

                <div class="form-group">
                        <label for="descripcion">Descipcion</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control" >{{old('descripcion', $modo_servicio->descripcion) }}</textarea>
                    </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
