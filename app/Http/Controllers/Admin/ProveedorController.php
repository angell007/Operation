<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Proveedor;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Nit', 'data' => 'nit'],
            ['title' => 'Direccion', 'data' => 'direccion'],
            ['title' => 'Ciudad', 'data' => 'ciudad'],
            ['title' => 'Telefono', 'data' => 'telefono'],
            ['title' => 'Telefono dos', 'data' => 'telefono_opcional'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.proveedors.datatables'));
        $html->setTableAttribute('id', 'proveedors_datatables');

        return view('admin.proveedors.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Proveedor::query())
            ->editColumn('actions', function ($proveedor) {
                return view('admin.proveedors.datatables.actions', compact('proveedor'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.proveedors.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:proveedors,name,',
            'nit' => 'required|unique:proveedors,nit',
            'direccion' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required'

        ]);

        $proveedor = Proveedor::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Proveedor created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Proveedor $proveedor)
    {
        return view('admin.proveedors.update', compact('proveedor'));
    }

    public function update(Proveedor $proveedor)
    {
        request()->validate([
            'name' => 'required|unique:proveedors,name,' . $proveedor->id,
            'nit' => 'required|unique:proveedors,nit,'. $proveedor->id,
            'direccion' => 'required',
            'ciudad' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required'
        ]);

        $proveedor->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Proveedor updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Proveedor $proveedor)
    {
        $proveedor->delete();

        return response()->json([
            'flash_now' => ['success', 'Proveedor deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
