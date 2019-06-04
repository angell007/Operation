<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Detalle;

class DetalleController extends Controller
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
        $html->ajax(route('admin.detalles.datatables'));
        $html->setTableAttribute('id', 'detalles_datatables');

        return view('admin.detalles.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Detalle::query())
            ->editColumn('actions', function ($detalle) {
                return view('admin.detalles.datatables.actions', compact('detalle'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.detalles.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:detalles',
        ]);

        $detalle = Detalle::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Detalle created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Detalle $detalle)
    {
        return view('admin.detalles.update', compact('detalle'));
    }

    public function update(Detalle $detalle)
    {
        request()->validate([
            'name' => 'required|unique:detalles,name,' . $detalle->id,
        ]);

        $detalle->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Detalle updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Detalle $detalle)
    {
        $detalle->delete();

        return response()->json([
            'flash_now' => ['success', 'Detalle deleted!'],
            'reload_datatables' => true,
        ]);
    }
}