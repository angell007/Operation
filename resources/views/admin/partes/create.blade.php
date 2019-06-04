@extends('laracrud::layouts.modal')

@section('title', 'Registrar Parte')
@section('content')
    <form method="POST" action="{{ route('admin.partes.create', $id) }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="row">

            <div class="form-group font-weight-bold col-md-12">
                    <label> Referencia </label>
                    <input type="text" name="referencia" onkeydown ="costoParte()" class="col-sm-6 custom-select custom-select-sm font-weight-bold" list="referencia">
                    <datalist id="referencia">
                        @foreach ($partes as $item)
                        <option  id="ref" value= {{ $item->referencia }}>  {{  $item->name }} <=> {{ ' Disponibles : ' . $item->cantidad }} <=> {{ ' Costo base :  $' . $item->costo_con_iva }}</option>
                        @endforeach
                    </datalist>
                </div>


            <div class="form-group col-md-6">
                <label> Cantidad </label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad "
                value="{{ old('cantidad') }}">
            </div>

            {{-- <div class="form-group col-md-6">
                <label> Costo base </label>
                <input class="form-control" name="costo_venta" id="costo_base" >
            </div> --}}

            <div class="form-group col-md-6">
                    <label> Costo unidad </label>
                    <input class="form-control" name="costo" id="costo" >
            </div>
        </div>

        </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-round btn-primary">Save</button>
                <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
            </div>

    </form>
@endsection
