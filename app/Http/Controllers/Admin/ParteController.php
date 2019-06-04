<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Parte;
use App\Producto;

class ParteController extends Controller
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
        $html->ajax(route('admin.partes.datatables'));
        $html->setTableAttribute('id', 'partes_datatables');

        return view('admin.partes.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Parte::query())
            ->editColumn('actions', function ($parte) {
                return view('admin.partes.datatables.actions', compact('parte'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal($id)
    {
        $partes = Producto::all();
        return view('admin.partes.create' , compact('partes','id'));
    }

    public function create($id)
    {

        request()->validate([
            'referencia' => 'required|exists:productos,referencia',
            'cantidad' => 'required',
            'costo' => 'required',

        ]);

            $parte = new \App\Parte;
            $parte->producto_id = request()->referencia;
            $parte->cantidad = request()->cantidad;
            $parte->costo = request()->costo;
            $parte->costo_total = request()->costo * request()->cantidad;
            $parte->servicio_id = $id;
            $parte->saveOrfail();
            $producto = Producto::where('referencia', request()->referencia)->first();
            if (request()->cantidad > $producto->cantidad) {
                return response()->json([
                    'flash_now' => ['danger', 'Unsuccessfully!'],
                    // 'dismiss_modal' => true,
                    // 'reload_page' => true,
                ]);
            } else {
                    Producto::findOrFail($producto->id)->decrement('cantidad', request()->cantidad );
                    return response()->json([
                        'flash_now' => ['success', 'Parte created!'],
                        'dismiss_modal' => true,
                        'reload_page' => true,
                    ]);
            }

        // return response()->json([
        //     'flash_now' => ['success', 'Parte created!'],
        //     'dismiss_modal' => true,
        //     'reload_page' => true,
        // ]);
    }

    public function updateModal(Parte $parte)
    {
        return view('admin.partes.update', compact('parte'));
    }

    public function update(Parte $parte)
    {
        request()->validate([
            'name' => 'required|unique:partes,name,' . $parte->id,
        ]);

        $parte->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Parte updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Parte $parte)
    {
        $parte->delete();

        return response()->json([
            'flash_now' => ['success', 'Parte deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
