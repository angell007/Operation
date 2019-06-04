<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tipo;

class TipoController extends Controller
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
        $html->ajax(route('admin.tipos.datatables'));
        $html->setTableAttribute('id', 'tipos_datatables');

        return view('admin.tipos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Tipo::query())
            ->editColumn('actions', function ($tipo) {
                return view('admin.tipos.datatables.actions', compact('tipo'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.tipos.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:modo_servicios',
            'descripcion' => 'required'
        ]);

        $tipo = Tipo::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Tipo created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Tipo $tipo)
    {
        return view('admin.tipos.update', compact('tipo'));
    }

    public function update(Tipo $tipo)
    {
        request()->validate([
            'name' => 'required|unique:tipos,name,' . $tipo->id,
            'descripcion' => 'required'
            ]);

        $tipo->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Tipo updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Tipo $tipo)
    {
        $tipo->delete();

        return response()->json([
            'flash_now' => ['success', 'Tipo deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
