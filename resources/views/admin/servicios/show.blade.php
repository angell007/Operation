@extends('laracrud::layouts.auth')

@section('title', 'Servicio')
@section('child-content')
<div class="row align-items-center mb-3">
    <div class="col-lg">
        <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
    </div>
    {{--  <div class="col-lg-auto">
            <button type="button" class="btn btn-round btn-primary" data-modal="{{ route('admin.servicios.create') }}">
    <i class="fal fa-plus"></i> Create Servicio
    </button>
</div> --}}
</div>

@if (Session::has('success_msg'))
<div class="alert bg-success">
    <span class="glyphicon glyphicon-ok"></span>
    <em>{!! Session::get('success_msg') !!}</em>
</div>
@endif

@foreach ($servicios as $servicio)
<div class="form-group font-weight-bold col-md-12">
    @if (!count($servicio->articulos)>0)
    <button type="button" class="btn btn-round btn-primary pb-1 m-1 "
        data-modal="{{ route('admin.articulos.create', $servicio->id) }}">
        <i class="fal fa-plus"></i> Registrar Articulo
    </button>
    @endif

    <button type="button" class="btn btn-round btn-icon btn-success pb-1 m-1 " title="parte"
        data-modal="{{ route('admin.partes.create', $servicio->id) }}">
        <i class="fal fa-fw fa-plus"></i>Registrar parte
    </button>

    <button type="button" class="btn btn-round btn-icon btn-warning pb-1 m-1 " title="nueva nota"
        data-modal="{{ route('admin.notas.create', $servicio->id) }}">
        <i class="fal fa-fw fa-pencil"></i>Nueva Nota
    </button>
</div>

<form method="POST" action="{{ route('admin.servicios.update', $servicio->id) }}">
    @csrf
    @method('PATCH')
    {{--  Section cliente Tabla que muestra cliente   --}}
    <div class="row">
        @if (isset($servicio->cliente->identificacion))
        <div class="form-group col-md-12 font-weight-bold table-responsive pb-3 m-3">
            <label class="text text-uppercase text-info ">Info de Cliente </label>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <tr>
                            <td>
                                {{ $servicio->cliente->fullname }}</td>
                            <td>
                                <a style="cursor:pointer" class=" alert-success btn-round pointer " title="Update"
                                    data-modal="{{ route('admin.clientes.update', $servicio->cliente->id) }}">
                                    <i>{{ $servicio->cliente->identificacion }}</i>
                                </a>
                            </td>
                            <td>{{ $servicio->cliente->telefono}}</td>
                            <td>{{ $servicio->cliente->email }}</td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
        @endif

        @if (count($servicio->notas)>0)
        <div class="form-group col-md-12 font-weight-bold table-responsive pb-3 m-3">
            <label class="text text-uppercase text-info">Historial del servicio </label>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                {{-- {{dd($servicio->notas[0]->user)}} --}}
                @foreach ($servicio->notas as $item)
                <tr>
                    <td>{{  $item->updated_at}}</td>
                    <td>{{  $item->user->name}}</td>
                    <td>{{  $item->descripcion}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                </tr>
            </table>
        </div>
        @endif
        {{-- {{dd($servicio->partes )}} --}}
        @if (count($servicio->partes)>0)
        <div class="form-group table-responsive  text-uppercase text-info font-weight-bold col-md-6">
            <label>Productos asociados a este servicio</label>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Referencia</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">costo unidad</th>
                        <th scope="col">costo total </th>

                    </tr>
                </thead>
                    @foreach ($servicio->partes as $item)
                    <tr>
                        <td>
                        <button type="button" class="btn btn-round btn-icon " title="Update" data-modal="{{ route('admin.productos.update', $item->producto_id) }}">
                            <i></i> {{ $item->producto_id }}
                        </button>
                        </td>
                        <td>{{$item->cantidad }}</td>
                        <td>{{ $item->costo }}</td>
                        <td>{{ $item->costo_total }}</td>

                    </tr>
                    @endforeach
                </table>
    </div>
    @else
    {{-- <div class="form-group  text-uppercase font-weight-bold col-md-12">
            <label class="text-primary " > No hay ventas asociado a este servicio</label>
    </div> --}}
    @endif

    @if (count($servicio->articulos)>0)
    <div class="form-group col-md-12 font-weight-bold table-responsive pb-3 m-3">
        <label class="text text-uppercase text-info">Articulo asociado a este servicio</label>
        @foreach ($servicio->articulos as $item)
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Serie</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Imei 1</th>
                    <th scope="col">Imei 2</th>
                    <th scope="col">tipo</th>
                    <th scope="col">Almacen</th>
                    <th scope="col"> # Garantia</th>
                    {{-- <th scope="col">Serie</th> --}}

                </tr>
            </thead>
            <tr>

                <td class="text alert-info"> {{ $item->serie }} </td>
                <td class="text alert-info"> {{ $item->marca }} </td>
                <td class="text alert-info"> {{ $item->modelo }} </td>
                <td class="text alert-info"> {{ $item->imei1 }} </td>
                <td class="text alert-info"> {{ $item->imei2 }} </td>
                <td class="text alert-info"> {{ $item->tipo }} </td>
                <td class="text alert-info"> {{ $item->almacen_compra }} </td>
                <td class="text alert-info"> {{ $item->numero_vertificado_garantia }} </td>
            </tr>
        </table>
        @endforeach
    </div>
    @else
    <div class="form-group  text-uppercase font-weight-bold col-md-6">
            <label class="text-info " > No hay Articulos asociado a este servicio</label>
    </div>
    @endif

    @if (isset($servicio->razon->name))
    <div class="form-group font-weight-bold col-md-6 font-weight-bold">
        <label>Razon pendiente </label>
        <select class="form-control" name="razon_id">
            <option disabled selected value="{{ $servicio->razon->id }}">
                {{ $servicio->razon->name }}
            </option>
            @foreach ($pendientes as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    @endif

    @if (isset($servicio->tipo->name))
    <div class="form-group font-weight-bold col-md-3 font-weight-bold">
        <label>Tipo de servicio </label>
        <select class="form-control" name="tipo_id">
            <option value="{{ $servicio->tipo->id }}">{{ $servicio->tipo->name }}</option>
        </select>
    </div>
    @endif

    @if (isset($servicio->modoServicio->name))
    <div class="form-group font-weight-bold col-md-3 font-weight-bold">
        <label>Modo de servicio </label>
        <select class="form-control" name="modo_servicio_id">
            <option value="{{ $servicio->modoServicio->id }}">{{ $servicio->modoServicio->name }}</option>
        </select>
    </div>
    @else
    {{--
        <div class="form-group font-weight-bold col-md-6">
            <label>modo de servicio </label>
            <select class="form-control">
                <option> No hay modos de servicio </option>
            </select>
        </div>  --}}
    @endif

    <br>
    <div class="form-group font-weight-bold col-md-12">
        <label> </label>
    </div>
    <br>


    @if (isset($servicio->fecha_inicio))
    <div class="form-group font-weight-bold col-md-3 font-weight-bold">
        <label>Fecha inicio</label>
        <input type="date" class="form-control" name="fecha_inicio" placeholder="fecha inicio "
            value="{{ $servicio->fecha_inicio }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-3 font-weight-bold">
        <label> fecha inicio </label>
        <input type="date" class="form-control" name="fecha_inicio" placeholder="fecha inicio ">
    </div>
    @endif

    @if (isset($servicio->fecha_reparado))
    <div class="form-group font-weight-bold col-md-3">
        <label>Fecha reparado</label>
        <input type="date" class="form-control" name="fecha_reparado" id="frepar" placeholder="fecha reparado "
            value="{{ $servicio->fecha_reparado }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-3">
        <label> Fecha reparado </label>
        <input type="date" class="form-control" name="fecha_reparado" id="frepar" placeholder="fecha finalizado"
            value="{{ $servicio->fecha_reparado }}">
    </div>
    @endif


    @if (isset($servicio->fecha_finalizado))
    <div class="form-group font-weight-bold col-md-3">
        <label>Fecha finalizado</label>
        <input type="date" class="form-control" name="fecha_finalizado" id="ffinal" onfocus="update()"
            placeholder="fecha finalizado " value="{{ $servicio->fecha_finalizado }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-3">
        <label> Fecha finalizado </label>
        <input type="date" class="form-control" name="fecha_finalizado" id="ffinal" onfocus="update()"
            placeholder="fecha finalizado ">
    </div>
    @endif



    <br>
    <div class="form-group font-weight-bold col-md-12">
        <label> </label>
    </div>
    <br>
    {{--  Segundo bloque   --}}

    @if (isset($servicio->user->identificacion))
        <div class="form-group font-weight-bold col-md-6">
            <label> Tecnico asignado </label>
            <select class="form-control" name="user_id">
                <option value="{{ $servicio->user->identificacion }}">{{ $servicio->user->fullname }}
                </option>
                @foreach ($usuarios as $item)
                <option value="{{ $item->identificacion }}"> {{ $item->fullname }}</option>
                @endforeach
            </select>
        </div>
        @else
        <div class="form-group font-weight-bold col-md-6">
            @if (isset($usuarios))
            <label> Sin Tecnico asignado (Asigna) </label>
            <input type="text" name="user_id" class="form-control" list="user_id">
            <datalist id="user_id">
                @foreach ($usuarios as $item)
                <option value={{ $item->identificacion }}>{{ $item->name }}</option>
                @endforeach
            </datalist>
        </div>
        @endif
    @endif

    <div class="form-group font-weight-bold col-md-6">
        <label> Ubicacion del producto </label>
        <input type="text" class="form-control" value="{{ old('ubicacion_producto', $servicio->ubicacion_producto) }}" name='ubicacion_producto' placeholder="ubicacion del producto ">

    </div>

    @if (isset($servicio->mano_obra))
    <div class="form-group font-weight-bold col-md-6">
        <label>Valor de mano obra </label>
        <input type="number" class="form-control" name="mano_obra" placeholder="valor mano de obra"
            value="{{ $servicio->mano_obra }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-6">
        <label>Valor de mano obra </label>
        <input type="number" class="form-control" name="mano_obra" placeholder="valor mano de obra">
    </div>
    @endif

    @if (isset($servicio->valor_asegurado_producto))
    <div class="form-group font-weight-bold col-md-6">
        <label>Valor asegurado producto </label>
        <input type="number" class="form-control" name="valor_asegurado_producto" placeholder="valor mano de obra"
            value="{{ $servicio->valor_asegurado_producto }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-6">
        <label>Valor  asegurado producto </label>
        <input type="number" class="form-control" name="valor_asegurado_producto" placeholder="valor mano de obra">
    </div>
    @endif

    @if (isset($servicio->valor_cotizado))
    <div class="form-group font-weight-bold col-md-6">
        <label>Valor  cotizado </label>
        <input type="number" class="form-control" name="valor_cotizado" placeholder="valor mano de obra"
            value="{{ $servicio->valor_cotizado }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-6">
        <label>Valor  cotizado </label>
        <input type="number" class="form-control" name="valor_cotizado" placeholder="valor mano de obra">
    </div>
    @endif

    @if (isset($servicio->valor_total))
    <div class="form-group font-weight-bold col-md-6">
        <label> Valor total autorizado </label>
        <input type="number" class="form-control" name="valor_total" placeholder="Valor"
            value="{{ $servicio->valor_total }}">
    </div>
    @else

    <div class="form-group font-weight-bold col-md-6">
        <label>Valor  total </label>
        <input type="number" class="form-control" name="valor_total" placeholder="Valor">
    </div>
    @endif

    {{--  Inician Happy calls estados   --}}

    @if (isset($servicio->happy_call_estado))
    <div class="form-group font-weight-bold col-md-6">
        <label>Happy call estado </label>
        <input type="text" class="form-control" name="happy_call_estado" placeholder="Happy call estado"
            value="{{ $servicio->happy_call_estado }}">
    </div>
    @else
    <div class="form-group font-weight-bold col-md-6">
        <label>Happy call estado </label>
        <input type="text" class="form-control" name="happy_call_estado" placeholder="Happy call estado">
    </div>
    @endif


    @if (isset($servicio->happy_call_calificacion))
    <div class="form-group font-weight-bold col-md-6">
        <label>Happy call calificacion </label>
        <select name="happy_call_calificacion" id="" disabled="disabled" class="form-control">
            <option>
                {{ $servicio->happy_call_calificacion }}
            </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    @else
    <div class="form-group font-weight-bold col-md-6">
        <label>Happy call calificacion </label>
        <select name="happy_call_calificacion" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    @endif

    @if (isset($servicio->reporte_cliente))
    <div class="form-group font-weight-bold col-md-6">
        <label>Comentario del cliente </label>
        <textarea cols="5" rows="5" name="reporte_cliente" type="text"
            class="form-control">{{ $servicio->reporte_cliente }}</textarea>
    </div>
    @else
    <div class="form-group font-weight-bold col-md-6">
        <label>comentario del cliente </label>
        <textarea cols="5" rows="5" name="reporte_cliente" type="text" class="form-control"></textarea>
    </div>
    @endif


    @if (isset($servicio->reporte_tecnico))
    <div class="form-group font-weight-bold col-md-6">
        <label>Reporte tecnico </label>
        <textarea cols="5" rows="5" name="reporte_tecnico" type="text"
            class="form-control">{{ $servicio->reporte_tecnico }}</textarea>
    </div>
    @else
    <div class="form-group font-weight-bold col-md-6">
        <label>Reporte tecnico </label>
        <textarea cols="5" rows="5" name="reporte_tecnico" type="text" class="form-control"></textarea>
    </div>
    @endif

    <div class="form-group font-weight-bold col-md-6">
        <button type="submit" class="btn btn-dark">Guardar Servicio</button>
    </div>

</form>

@endforeach

{{-- section nueva nota --}}
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <!-- Modal Header --> --}}
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nueva Nota al Servico </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>

            {{-- <!-- Modal Body --> --}}
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputMessage">Descripcion</label>
                        <textarea cols="10" rows="5" class="form-control" id="inputMessage"
                            placeholder="Enter your message"></textarea>
                    </div>
                </form>
            </div>

            {{-- <!-- Modal Footer --> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitForm()">submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
