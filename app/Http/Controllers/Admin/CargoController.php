<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cargo;

class CargoController extends Controller
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
        $html->ajax(route('admin.cargos.datatables'));
        $html->setTableAttribute('id', 'cargos_datatables');

        return view('admin.cargos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Cargo::query())
            ->editColumn('actions', function ($cargo) {
                return view('admin.cargos.datatables.actions', compact('cargo'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.cargos.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:cargos',
        ]);

        $cargo = Cargo::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Cargo created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Cargo $cargo)
    {
        return view('admin.cargos.update', compact('cargo'));
    }

    public function update(Cargo $cargo)
    {
        request()->validate([
            'name' => 'required|unique:cargos,name,' . $cargo->id,
        ]);

        $cargo->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Cargo updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Cargo $cargo)
    {
        $cargo->delete();

        return response()->json([
            'flash_now' => ['success', 'Cargo deleted!'],
            'reload_datatables' => true,
        ]);
    }
}