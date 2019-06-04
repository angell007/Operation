@extends('laracrud::layouts.modal')

@section('title', 'Registrar User')
@section('content')
    <form method="POST" action="{{ route('admin.users.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="row">
            <div class="form-group col-md-12">
                <label for="name">Nombre completo </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group col-md-6">
                    <label for="identificacion">Documento</label>
                    <input type="number" name="identificacion" id="identificacion" class="form-control" value="{{ old('documento') }}">
                </div>

            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
            </div>

            <div class="form-group col-md-6">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value=""></option>
                    @foreach(config('laracrud.roles') as $role)
                        <option value="{{ $role }}"{{ old('role') == $role ? ' selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
