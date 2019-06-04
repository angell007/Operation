<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:Admin']);
    }

    public function index()
    {
        $html = app('datatables.html')->columns([
            ['title' => 'Name', 'data' => 'name'],
            ['title' => 'Documento', 'data' => 'identificacion'],
            ['title' => 'Email', 'data' => 'email'],
            ['title' => 'Role', 'data' => 'role'],
            ['title' => '', 'data' => 'actions', 'searchable' => false, 'orderable' => false],
        ]);
        $html->ajax(route('admin.users.datatables'));
        $html->setTableAttribute('id', 'users_datatables');

        return view('admin.users.index', compact('html'));
    }

    public function datatables()
    {
        $datatables = datatables(User::query())
            ->editColumn('actions', function ($user) {
                return view('admin.users.datatables.actions', compact('user'));
            })
            ->rawColumns(['actions']);

        return $datatables->toJson();
    }

    public function createModal()
    {
        return view('admin.users.create');
    }

    public function create()
    {
        request()->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique',
            'password' => 'required|confirmed',
            'role' => 'required',
            'identificacion' => 'required|unique:users,identificacion',
            ]);

        $user = User::create(request()->all());

        return response()->json([
            'flash_now' => ['success', 'User created!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function updateModal(User $user)
    {
        return view('admin.users.update', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'identificacion' => 'required|unique:users,identificacion,' . $user->id,
        ]);

        $user->update(request()->all());

        return response()->json([
            'flash_now' => ['success', 'User updated!'],
            'dismiss_modal' => true,
            'reload_datatables' => true,
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json([
            'flash_now' => ['success', 'User deleted!'],
            'reload_datatables' => true,
        ]);
    }
}
