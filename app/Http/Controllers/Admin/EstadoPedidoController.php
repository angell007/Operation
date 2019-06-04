<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\EstadoPedido;

class EstadoPedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],

            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.estado_pedidos.datatables'));
        $html->setTableAttribute('id', 'estado_pedidos_datatables');

        return view('admin.estado_pedidos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(EstadoPedido::query())
            ->editColumn('actions', function ($estado_pedido) {
                return view('admin.estado_pedidos.datatables.actions', compact('estado_pedido'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.estado_pedidos.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:estado_pedidos',
            'descripcion' => 'required'
        ]);

        $estado_pedido = EstadoPedido::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'EstadoPedido created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(EstadoPedido $estado_pedido)
    {
        return view('admin.estado_pedidos.update', compact('estado_pedido'));
    }

    public function update(EstadoPedido $estado_pedido)
    {
        request()->validate([
            'name' => 'required|unique:estado_pedidos,name,' . $estado_pedido->id,
            'descripcion' => 'required'
        ]);

        $estado_pedido->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'EstadoPedido updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(EstadoPedido $estado_pedido)
    {
        $estado_pedido->delete();

        return response()->json([
            'flash_now' => ['success', 'EstadoPedido deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
