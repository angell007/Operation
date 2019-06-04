<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pedido;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.pedidos.datatables'));
        $html->setTableAttribute('id', 'pedidos_datatables');

        return view('admin.pedidos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Pedido::query())
            ->editColumn('actions', function ($pedido) {
                return view('admin.pedidos.datatables.actions', compact('pedido'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.pedidos.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:pedidos',
        ]);

        $pedido = Pedido::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Pedido created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Pedido $pedido)
    {
        return view('admin.pedidos.update', compact('pedido'));
    }

    public function update(Pedido $pedido)
    {
        request()->validate([
            'name' => 'required|unique:pedidos,name,' . $pedido->id,
        ]);

        $pedido->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Pedido updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Pedido $pedido)
    {
        $pedido->delete();

        return response()->json([
            'flash_now' => ['success', 'Pedido deleted!'],
            'reload_datatables' => true,
        ]);
    }
}