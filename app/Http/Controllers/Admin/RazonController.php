<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Razon;

class RazonController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => '#', 'data' => 'id'],
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Descripcion', 'data' => 'descripcion'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.razons.datatables'));
        $html->setTableAttribute('id', 'razons_datatables');

        return view('admin.razons.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Razon::query())
            ->editColumn('actions', function ($razon) {
                return view('admin.razons.datatables.actions', compact('razon'));
            })
            ->setRowClass(function ($razon) {
                switch ($razon->id) {
                    case 1:
                    return 'bg-white text-danger font-weight-bold';
                    break;
                    case 2:
                        return 'alert-repuestos font-weight-bold';
                        break;
                    case 3:
                        return 'alert-back font-weight-bold';
                        break;
                    case 4:
                        return 'bg-danger text-white font-weight-bold';
                        break;
                    case 5:
                        return 'alert-danger text-danger font-weight-bold';
                        break;
                    case 6:
                        return 'bg-dark text-white font-weight-bold';
                        break;
                    case 7:
                        return 'bg-warning font-weight-bold';
                        break;
                    case 8:
                        return 'alert-cambio text-white font-weight-bold';
                        break;
                    case 9:
                        return 'bg-info font-weight-bold';
                    break;
                    case 10:
                        return 'alert-ausente font-weight-bold';
                        break;
                    case 11:
                        return 'bg-success text-white font-weight-bold';
                        break;
                    case 12:
                        return 'alert-danger text-danger font-weight-bold';
                        break;

                    default:
                        return 'bg-dark text-success font-weght-bold';
                        break;
                }
            }
            )
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.razons.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required|unique:modo_servicios',
            'descripcion' => 'required'
        ]);

        $razon = Razon::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Razon created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Razon $razon)
    {
        return view('admin.razons.update', compact('razon'));
    }

    public function update(Razon $razon)
    {
        request()->validate([
            'name' => 'required|unique:razons,name,' . $razon->id,
            'descripcion' => 'required'

            ]);

        $razon->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Razon updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Razon $razon)
    {
        $razon->delete();

        return response()->json([
            'flash_now' => ['success', 'Razon deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
