<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Servicio;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'fullname','visible' => 'false'],
            ['title' => 'Apellido', 'data' => 'apellido'],
            ['title' => 'Identificacion', 'data' => 'identificacion'],
            ['title' => 'Direccion', 'data' => 'direccion'],
            ['title' => 'Barrio', 'data' => 'barrio'],
            ['title' => 'Telefono', 'data' => 'telefono'],
            ['title' => 'Telefono Opcional', 'data' => 'opcional_telefono'],

            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.clientes.datatables'));
        $html->setTableAttribute('id', 'clientes_datatables');

        return view('admin.clientes.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Cliente::orderBy('id','Desc')->get())
            ->editColumn('actions', function ($cliente) {
                return view('admin.clientes.datatables.actions', compact('cliente'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.clientes.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required',
            'apellido' => 'required',
            'sexo' => 'required',
            //  'email' => 'required|',
            'identificacion' => 'required|unique:clientes|numeric|digits_between:1,10',
            'tipo_identificacion' => 'required',
            'ciudad' => 'required',
            'departamento' => 'required',
            'direccion' => 'required',
            'tipo_casa' => 'required',
            'barrio' => 'required',
            'telefono' => 'required',
        ]);

        $cliente = Cliente::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Cliente created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Cliente $cliente)
    {
        $cliente  = Cliente::find($cliente->id);
        return view('admin.clientes.update', compact('cliente'));
    }

    public function update(Cliente $cliente)
    {
        request()->validate([
            'name' => 'required',
            'name' => 'required',
            'apellido' => 'required',
            'sexo' => 'required',
            'identificacion' => 'required|numeric|digits_between:1,10|unique:clientes,identificacion,' . $cliente->id,
            'tipo_identificacion' => 'required',
            'ciudad' => 'required',
            'departamento' => 'required',
            'direccion' => 'required',
            'tipo_casa' => 'required',
            'barrio' => 'required',
            'telefono' => 'required',

            ]);

        $cliente->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'Cliente updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json([
            'flash_now' => ['success', 'Cliente deleted!'],
            'reload_datatables' => true,
        ]);
    }

    public function servicios($id){

     $aux = Cliente::findOrFail($id);

    //  dd($id);
            $html = app('datatables.html')->columns([
                // ['title' => '#', 'data' => 'id','visible' => 'false'],
                ['title' => 'Razon', 'data' => 'razon.name'],
                ['title' => 'Tecnico', 'data' => 'user.name'],
                // ['title' => 'Cliente', 'data' => 'cliente.fullname'],
                // ['title' => 'Doc Cliente', 'data' => 'cliente.identificacion'],
                ['title' => 'Nota' , 'data' => 'lastestnota.ultima', 'searchable' => false, 'orderable' => false],
                ['title' => 'Fecha inicio', 'data' => 'fecha_inicio'],
                ['title' => 'Fecha reparado', 'data' => 'fecha_reparado'],
                ['title' => 'Fecha finalizado', 'data' => 'fecha_finalizado'],

                ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
            ]);

            $html->ajax(route('admin.clientes.serviciosCliente', $aux->identificacion));
            $html->setTableAttribute('id', 'servicios_datatables');
            $cliente =   Cliente::findOrFail($id);
            return  view('admin.clientes.show')->with(compact(['cliente','html']));
    }

    public function serviciosCliente($id)
    {
        $datatables = datatables(Servicio::with('cliente','razon','user','lastestnota','tipo', 'modoservicio')->where('cliente_id', $id)->get())
            ->editColumn('actions', function ($servicio) {
                return view('admin.clientes.datatables.actionss', compact('servicio'));
            })
            // ->editColumn('user.name', function ($servicio) {
            //     if(!isset($servicio->user)
            //     {

            //         return 'sin Tecnico';
            //     }
            // })
            ->setRowClass(function ($servicio) {
                switch ($servicio->razon->id) {
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
                        return 'bg-danger text-dark font-weight-bold';
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
                        return 'alert-cambio text-dark font-weight-bold';
                        break;
                    case 9:
                        return 'bg-info font-weight-bold';
                    break;
                    case 10:
                        return 'alert-ausente font-weight-bold';
                        break;
                    case 11:
                        return 'bg-success text-dark font-weight-bold';
                        break;
                    case 12:
                        return 'alert-danger text-danger font-weight-bold';
                        break;

                    default:
                        return 'bg-dark text-success font-weght-bold';
                        break;
                }})
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }
}
