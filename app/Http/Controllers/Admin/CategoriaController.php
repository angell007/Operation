<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriaController extends Controller
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
        $html->ajax(route('admin.categorias.datatables'));
        $html->setTableAttribute('id', 'categorias_datatables');

        return view('admin.categorias.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Categoria::query())
            ->editColumn('actions', function ($categoria) {
                return view('admin.categorias.datatables.actions', compact('categoria'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.categorias.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:categorias',
        ]);

        $categoria = Categoria::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Categoria created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Categoria $categoria)
    {
        return view('admin.categorias.update', compact('categoria'));
    }

    public function update(Categoria $categoria)
    {
        request()->validate([
            'name' => 'required|unique:categorias,name,' . $categoria->id,
        ]);

        $categoria->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Categoria updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json([
            'flash_now' => ['success', 'Categoria deleted!'],
            'reload_datatables' => true,
        ]);
    }
}