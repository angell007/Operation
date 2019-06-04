<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Nota;

class NotaController extends Controller
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
        $html->ajax(route('admin.notas.datatables'));
        $html->setTableAttribute('id', 'notas_datatables');

        return view('admin.notas.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Nota::query())
            ->editColumn('actions', function ($nota) {
                return view('admin.notas.datatables.actions', compact('nota'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal($id)
    {
        return view('admin.notas.create',compact('id'));
    }

    public function create($id)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $nota = new  \App\nota ;
        $nota->descripcion = request()->descripcion;
        $nota->user_id = \Auth::user()->id;
        $nota->servicio_id = $id;
        $nota->saveOrFail();
        return back();
    }

    public function updateModal(Nota $nota)
    {
        return view('admin.notas.update', compact('nota'));
    }

    public function update(Nota $nota)
    {
        request()->validate([
            'name' => 'required|unique:notas,name,' . $nota->id,
        ]);

        $nota->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Nota updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Nota $nota)
    {
        $nota->delete();

        return response()->json([
            'flash_now' => ['success', 'Nota deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
