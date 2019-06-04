<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Articulo;

class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    // public function index()
    // {
    //     $html = app('datatables.html')->columns([
    //         ['title' => 'Tipo', 'data' => 'tipo'],
    //         ['title' => 'Marca', 'data' => 'marca'],
    //         ['title' => 'Modelo', 'data' => 'modelo'],
    //         ['title' => 'Serie', 'data' => 'serie'],

    //         ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
    //     ]);
    //     $html->ajax(route('admin.articulos.datatables'));

    //     $html->setTableAttribute('id', 'articulos_datatables');

    //     return view('admin.articulos.index', compact('html'));
    // }

    // public function datatables()
    // {
    //     $datatables = datatables(Articulo::query())
    //         ->editColumn('actions', function ($articulo) {
    //             return view('admin.articulos.datatables.actions', compact('articulo'));
    //         })
    //         ->rawColumns(['actions']);

    //     return $datatables->toJson();
    // }

    public function createModal($articulo)
    {
        return view('admin.articulos.create', compact('articulo'));
    }

    public function create($articulo)
    {
        request()->validate([
            // 'tipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            // 'servicio_id' => 'required',
            'serie' => 'required|unique:articulos,serie',
            'imei1' => 'unique:articulos,imei1',
            'imei2' => 'unique:articulos,imei2',
            // 'almacen_compra' => 'required',
            // 'numero_factura_compra' => 'required',
            // 'numero_vertificado_garantia' => 'required',
        ]);

        try {
            $article = new \App\Articulo;
            $article->servicio_id = $articulo;
            $article->marca =     request()->marca;
            $article->modelo =    request()->modelo;
            $article->serie =     request()->serie;
            $article->imei1 =     request()->imei1;
            $article->imei2 =      request()->imei2;
            $article->tipo =      request()->tipo;
            $article->almacen_compra =     request()->almacen_compra;
            $article->numero_factura_compra =     request()->numero_factura_compra;
            $article->numero_vertificado_garantia =     request()->numero_vertificado_garantia;
            $article->saveOrFail();
            return response()->json([
                'flash_now' => ['success', 'successfully'],
                'dismiss_modal' => true,
                'reload_page' => true,
            ]);

            } catch (\Throwable $th) {
                return response()->json([
                    'flash_now' => ['danger', $th->getMessage()],
                //     'dismiss_modal' => true,
                //     'reload_pages' => true,
                ]);

            }


        // $articulo = Articulo::create(request()->all());

        // return response()->json([
        //     'flash_now' => ['success', 'Articulo created!'],
        //     'dismiss_modal' => true,
        //     'reload_datatables' => true,
        // ]);
    }

    public function updateModal(Articulo $articulo)
    {
        return view('admin.articulos.update', compact('articulo'));
    }

    public function update(Articulo $articulo)
    {
        request()->validate([
            'name' => 'required|unique:articulos,name,' . $articulo->id,
        ]);

        $articulo->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Articulo updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Articulo $articulo)
    {
        $articulo->delete();

        return response()->json([
            'flash_now' => ['success', 'Articulo deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
