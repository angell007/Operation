@extends('laracrud::layouts.modal')

@section('title', 'Registrar Servicio')
@section('content')
    <form method="POST" action="{{ route('admin.servicios.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="row">

            @if (isset($modos))
            <div class="form-group col-md-6">
                <label>modo de servicios </label>
                <select  id="modo_servicio_id" class="form-control" name="modo_servicio_id">
                    <option disabled selected> Choose...</option>
                    @foreach ($modos as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            @else

            <div class="form-group col-md-6">
                <label>modo de servicios </label>
                <select class="form-control">
                    <option disabled selected> No hay modos </option>
                </select>
            </div>
            @endif

            @if (isset($tipos))
            <div class="form-group col-md-6">
                <label>tipo de servicios </label>
                <select  id="tipo_id" class="form-control" name="tipo_id">
                    <option disabled selected> Choose...</option>
                    @foreach ($tipos as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            @else

            <div class="form-group col-md-6">
                <label>tipo de servicios </label>
                <select class="form-control">
                    <option disabled selected> No hay Tipos </option>
                </select>
            </div>
            @endif

            @if (isset($clientes))
            <div class="form-group col-md-6">
            <label> Clientes </label>
                    <input type="text" name="cliente_id" class="form-control" list="cliente_id">
            <datalist  id="cliente_id">
                    @foreach ($clientes as $item)
                    <option   value="{{ $item->identificacion }}">{{ $item->name }}</option>
                    @endforeach
                    </datalist>
            </div>

            @else
            <div class="form-group col-md-6">
                <label> Clientes </label>
                <select class="form-control">
                    <option disabled selected> No hay clientes </option>
                </select>
            </div>
            @endif

            @if (isset($usuarios))
            <div class="form-group col-md-6">
            <label> Tecnicos </label>
                    <input type="text" name="user_id" class="form-control" list="user_id">
            <datalist  id="user_id">
                    @foreach ($usuarios as $item)
                    <option  value= {{ $item->identificacion }}>{{ $item->name }}</option>
                    @endforeach
                    </datalist>
            </div>
            @else

            <div class="form-group col-md-6">
                <label>Tecnico asignado </label>
                <select  class="form-control">
                    <option disabled selected> No hay Tecnicos </option>
                </select>
            </div>
            @endif



            <div class="form-group col-md-6">
                <label> fecha inicio </label>
                <input   id="fecha_inicio" class="form-control" name="fecha_inicio"  placeholder="fecha Inicio " value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
            </div>

             <div class="form-group col-md-6">
                <label> valor asegurado </label>
                <input  id="valor_asegurado_producto" type="text" class="form-control" name="valor_asegurado_producto" placeholder="valor asegurado">
            </div>

            <div class="form-group col-md-12">
                <label for="reporte_cliente">Reporte</label>
                <textarea type="text" name="reporte_cliente" id="reporte_cliente" class="form-control textarea" value="{{ old('reporte_cliente') }}"></textarea>
            </div>

    </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection


