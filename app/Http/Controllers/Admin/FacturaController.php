<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Factura;

class FacturaController extends Controller
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
        $html->ajax(route('admin.facturas.datatables'));
        $html->setTableAttribute('id', 'facturas_datatables');

        return view('admin.facturas.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Factura::query())
            ->editColumn('actions', function ($factura) {
                return view('admin.facturas.datatables.actions', compact('factura'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.facturas.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:facturas',
        ]);

        $factura = Factura::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Factura created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Factura $factura)
    {
        return view('admin.facturas.update', compact('factura'));
    }

    public function update(Factura $factura)
    {
        request()->validate([
            'name' => 'required|unique:facturas,name,' . $factura->id,
        ]);

        $factura->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Factura updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Factura $factura)
    {
        $factura->delete();

        return response()->json([
            'flash_now' => ['success', 'Factura deleted!'],
            'reload_datatables' => true,
        ]);
    }
}