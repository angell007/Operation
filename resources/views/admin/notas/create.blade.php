@extends('laracrud::layouts.modal')

@section('title', 'Registrar Nota')
@section('content')
    <form method="POST" action="{{ route('admin.notas.create', $id) }}" >
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea cols="10" rows="5" type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}"></textarea>
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
