<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Proveedor;
class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => '# Factura', 'data' => 'factura_id'],
            ['title' => 'Nombre', 'data' => 'name'],
            ['title' => 'Proveedor', 'data' => 'proveedor.name'],
            ['title' => '# De parte ', 'data' => 'referencia'],
            ['title' => 'Costo entrada', 'data' => 'costo_con_iva'],
            ['title' => 'Disponibles', 'data' => 'cantidad'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],

        ]);
        $html->ajax(route('admin.productos.datatables'));
        $html->setTableAttribute('id', 'productos_datatables');

        return view('admin.productos.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Producto::with('proveedor')->orderBy('id','Desc')->get())
            ->editColumn('actions', function ($producto) {
                return view('admin.productos.datatables.actions', compact('producto'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        $proveedores = Proveedor::select('name','id','nit')->get();
        return view('admin.productos.create', compact('proveedores'));
    }

    public function create()
    {
        request()->validate([
            'factura_id' => 'required',
            'proveedor_id' => 'required',
            'referencia' => 'required|unique:productos,referencia',
            'costo_sin_iva' => 'required',
            'iva' => 'required',
            'costo_con_iva' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required',

        ]);

        $producto = Producto::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Producto created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Producto $producto)
    {
        $proveedores = Proveedor::select('id','name')->get();
        return view('admin.productos.update', compact('producto','proveedores'));
    }

    public function update(Producto $producto)
    {
        request()->validate([
            'factura_id' => 'required',
            'proveedor_id' => 'required',
            'referencia' => 'required|unique:productos,referencia,'. $producto->id,
            // 'costo_sin_iva' => 'required',
            // 'iva' => 'required',
            'costo_con_iva' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required',
        ]);

        $producto->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Producto updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Producto $producto)
    {
        $producto->delete();

        return response()->json([
            'flash_now' => ['success', 'Producto deleted!'],
            'reload_datatables' => true,
        ]);
    }

    public function buscar($id)
    {
         try {
          $nit = Proveedor::where('id', $id)->select('nit')->get();
           return response()->json(['response' => $nit]);
          } catch (\Throwable $th) {
              return response()->json(['response' => "Sin Datos "]);
          }

    }
}
