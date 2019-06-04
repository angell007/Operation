<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ModoServicio;

class ModoServicioController extends Controller
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
        $html->ajax(route('admin.modo_servicios.datatables'));
        $html->setTableAttribute('id', 'modo_servicios_datatables');

        return view('admin.modo_servicios.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(ModoServicio::query())
            ->editColumn('actions', function ($modo_servicio) {
                return view('admin.modo_servicios.datatables.actions', compact('modo_servicio'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.modo_servicios.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:modo_servicios',
            'descripcion' => 'required'
            ]);

        $modo_servicio = ModoServicio::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'ModoServicio created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(ModoServicio $modo_servicio)
    {
        return view('admin.modo_servicios.update', compact('modo_servicio'));
    }

    public function update(ModoServicio $modo_servicio)
    {
        request()->validate([
            'name' => 'required|unique:modo_servicios,name,' . $modo_servicio->id,
            'descripcion' => 'required'
            ]);

        $modo_servicio->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'ModoServicio updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(ModoServicio $modo_servicio)
    {
        $modo_servicio->delete();

        return response()->json([
            'flash_now' => ['success', 'ModoServicio deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
