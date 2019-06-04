<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\Datatables\Html;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Servicio;
use App\User;
use App\Nota;
use App\ModoServicio;
use App\Tipo;
use App\Cliente;
use App\Razon;
use App\Articulo;
use App\Producto;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Razon', 'data' => 'razon.name'],
            ['title' => 'Tecnico', 'data' => 'user.name'],
            ['title' => 'Cliente', 'data' => 'cliente.fullname'],
            // ['title' => 'Doc Cliente', 'data' => 'cliente.identificacion'],
            ['title' => 'Nota' , 'data' => 'lastestnota.ultima', 'searchable' => false, 'orderable' => false],
            ['title' => 'Fecha inicio', 'data' => 'fecha_inicio'],
            ['title' => 'Fecha reparado', 'data' => 'fecha_reparado'],
            ['title' => 'Fecha finalizado', 'data' => 'fecha_finalizado'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);

        $html->ajax(route('admin.servicios.datatables'));
        $html->setTableAttribute('id', 'servicios_datatables');

        return view('admin.servicios.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(Servicio::with('cliente','razon','user','lastestnota','tipo', 'modoservicio')->orderBy('updated_at', 'desc')->get())
            ->editColumn('actions', function ($servicio) {

                return view('admin.servicios.datatables.actions', compact('servicio'));
            })

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
                }

            })->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        $usuarios = User::select('name','identificacion')->where('role','Tecnico')->get();
        $clientes = Cliente::select('name','apellido','identificacion')->get();
        $modos = ModoServicio::select('name','id')->get();
        $tipos = Tipo::select('name','id')->get();
        return view ('admin.servicios.create', compact('tipos','clientes','modos','usuarios'));

    }

    public function create()
    {
        request()->validate([
            'modo_servicio_id' => 'required',
            'tipo_id' => 'required',
            'cliente_id' => 'required|exists:clientes,identificacion',
            'user_id' => 'required|exists:users,identificacion',
            'reporte_cliente' => 'required',
            'valor_asegurado_producto' => 'required',

        ]);

        $servicio = Servicio::create(request()->all());
        if($servicio){
            $nota = new  \App\nota ;
            $nota->descripcion = 'Servicio ingresado';
            $nota->user_id = \Auth::user()->id;
            $nota->servicio_id = $servicio->id;
            $nota->saveOrFail();

        }

        return response()->json([
            'flash_now' => ['success', 'Servicio created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(Servicio $servicio)
    {
        return view('admin.servicios.update', compact('servicio'));
    }

    public function update(Servicio $servicio)
    {
        request()->validate([
        ]);

        $servicio->update(request()->all());
        return redirect()->route('admin.servicios.update',$servicio->id)->with('success_msg',' Servicio update ');
    }

    public function delete(Servicio $servicio)
    {
        $servicio->delete();

        return response()->json([
            'flash_now' => ['success', 'Servicio deleted!'],
            'reload_datatables' => true,
            // return back();
        ]);
    }

    public function servicio(Servicio $servicio)
    {
        $servicios = Servicio::where('id', $servicio->id)->with('cliente',
        'razon',
        'user',
        'articulos',
        'notas',
        'modoServicio',
        'tipo'
        )
        ->get();
        $notas = nota::with('user')->get();
        $usuarios = User::select('name','identificacion')->get();
        $articulos = Articulo::All()->pluck('serie');
        $productos = Producto::All()->pluck('referencia');
        $pendientes = Razon::select('name','id')->get();
        $modos = ModoServicio::All()->pluck('name');
        $tipos = Tipo::All()->pluck('name');
        return view ('admin.servicios.show', compact('servicios', 'notas', 'tipos','productos','modos','usuarios','articulos','pendientes'));
    }
}
